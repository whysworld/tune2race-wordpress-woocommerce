<?php

  require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');
  require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

  $servername = DB_HOST;
  $username = DB_USER;
  $password = DB_PASSWORD;
  $dbname = DB_NAME;

  // Create connection
  global $conn;
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  echo "Connected..." . PHP_EOL;

  use Box\Spout\Reader\ReaderFactory;
  use Box\Spout\Common\Type;

  require_once __DIR__ . '/Spout/Autoloader/autoload.php';

  if (isset($_POST["Import"])) {

    $filename = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

      // Get File extension eg. 'xlsx' to check file is excel sheet
      $pathinfo = pathinfo($_FILES["file"]["name"]);

      // check file has extension xlsx, xls and also check
      // file is not empty
      if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') && $_FILES['file']['size'] > 0) {

        // remove old data for new
        mysqli_query($conn, "TRUNCATE TABLE tr_brands");
        mysqli_query($conn, "TRUNCATE TABLE tr_models");
        mysqli_query($conn, "TRUNCATE TABLE tr_types");
        mysqli_query($conn, "TRUNCATE TABLE tr_years");
        mysqli_query($conn, "TRUNCATE TABLE tr_base_data");
        mysqli_query($conn, "TRUNCATE TABLE tr_price_stage_country");
        mysqli_query($conn, "TRUNCATE TABLE tr_meta_data");

        // Temporary file name
        $inputFileName = $_FILES['file']['tmp_name'];

        // Read excel file by using ReadFactory object.
        $reader = ReaderFactory::create(Type::XLSX);

        // Open file
        $reader->open($inputFileName);

        $all_data = [];
        $pricing_data = [];
        $header_data = [];
        // Number of sheet in excel file
        foreach ($reader->getSheetIterator() as $sheet) {

          $sheetName = trim($sheet->getName());

          if ($sheetName == 'alldata') {
            $count = 1;

            foreach ($sheet->getRowIterator() as $key => $row) {
              // It reads data after header. In the excel sheet,
              // header is in the first row.
              if ($count == 1) {
                foreach ($row as $hKey => $headerName) {
                  $header_data[$hKey] = $headerName;
                }

              } else {

                // Data of excel sheet
                foreach ($row as $vKey => $values) {
                  $all_data[$row[0]][$header_data[$vKey]] = $values;
                  checkOrCreateUniques($header_data[$vKey], $values);
                }

              }
              $count++;
            }
            echo PHP_EOL;
            print_r('All Data retrieved...');

          } else {

            $count = 1;
            // Each sheet is a new country - add to table as new or ignore
            $sheetNameEdited = ucwords(strtolower($sheetName));
            checkOrCreateUniques('Country', $sheetNameEdited);

            foreach ($sheet->getRowIterator() as $key => $row) {
              // It reads data after header. In the my excel sheet,
              // header is in the first row.
              if ($count == 1) {
                foreach ($row as $hKey => $headerName) {
                  $header_data[$hKey] = $headerName;
                  if ($headerName !== 'ID') {
                    checkOrCreateUniques('Stage', $headerName);
                  }
                }

              } else {

                // Data of extra pricing sheets per country
                foreach ($row as $vKey => $values) {
                  $pricing_data[$sheetNameEdited][$row[0]][$header_data[$vKey]] = $values;
                }

              }
              $count++;
            }

          }

        }

        echo PHP_EOL;
        print_r('Inserting Base Data...');
        // insert all base data with relationships
        $metasql = '';
        foreach ($all_data as $sheetId => $data) {
          $queries = checkOrCreateData($sheetId, $data);
          $metasql .= $queries;
        }

        $metaString = rtrim($metasql, ',');
        $metaString = $metaString . ';';

        $metaQuery = "INSERT INTO `tr_meta_data`  (`sheet_id`,`key`,`value`) VALUES" . $metaString;
        mysqli_query($conn, "START TRANSACTION");
        mysqli_query($conn, $metaQuery);
        mysqli_query($conn, "COMMIT");

        echo PHP_EOL;
        print_r('Base Data Inserted');

        echo PHP_EOL;
        print_r('Pricing data inserting...');
        // insert all pricing data based on country
        $pricesql = '';
        foreach ($pricing_data as $key => $data) {
          $priceQueries = checkOrCreatePricing($key, $data);
          $pricesql .= $priceQueries;
        }

        $priceString = rtrim($pricesql, ',');
        $priceString = $priceString . ';';

        $priceQuery = "INSERT INTO tr_price_stage_country (`sheet_id`,`country_id`,`stage_id`,`price`) VALUES" . $priceString;
        mysqli_query($conn, "START TRANSACTION");
        mysqli_query($conn, $priceQuery);
        mysqli_query($conn, "COMMIT");

        echo PHP_EOL;
        print_r('Pricing data Inserted');
        // Close excel file
        $reader->close();

        print_r('Import has Completed!');
        echo PHP_EOL;
        echo PHP_EOL;

      } else {

        echo "Please Select Valid Excel File";
      }

    } else {

      echo "Please Select Excel File";

    }
  }

  function checkOrCreateUniques($tablename, $value) {

    global $conn;

    if (!empty($value) && !empty($tablename)) {

      if ($value instanceof DateTime) {
        $date = $value->format('Y-m-d H:i:s');
        $value = $date;
      }

      $value = (string)trim($value);

      try {

        switch ($tablename) {
          case 'Brand':
            $stmt = $conn->prepare("INSERT INTO tr_brands (`name`,`created_at`,`modified_at`) values(?,now(),now())");
            break;
          case 'Model':
            $stmt = $conn->prepare("INSERT INTO tr_models (`name`,`created_at`,`modified_at`) values(?,now(),now())");
            break;
          case 'YEAR RANGE':
            $stmt = $conn->prepare("INSERT INTO tr_years (`name`,`created_at`,`modified_at`) values(?,now(),now())");
            break;
          case 'ENGINE & HP':
            $stmt = $conn->prepare("INSERT INTO tr_types (`name`,`created_at`,`modified_at`) values(?,now(),now())");
            break;
          case 'Stage':
            $stmt = $conn->prepare("INSERT INTO tr_stages (`name`,`created_at`,`modified_at`) values(?,now(),now())");
            break;
          case 'Country':
            $conn->set_charset("utf8");
            $stmt = $conn->prepare("INSERT INTO tr_countries (`name`,`created_at`,`modified_at`) values(?,now(),now())");
            $stmt->bind_param('s', $value);
            $stmt->execute();
            break;
          default:
            return false;
            break;

        }

        if ($tablename !== 'Country') {
          $stmt->bind_param('s', $value);
          $stmt->execute();
        }

      } catch (Exception $e) {
        echo 'Error with insert: ' . $e->getMessage();
      }
    }
  }

  function checkOrCreateData($sheetId, $dataArr) {

    global $conn;

    $extrasql = '';

    foreach ($dataArr as $key => $value) {

      if ($value instanceof DateTime) {
        $date = $value->format('Y-m-d H:i:s');
        $value = $date;
      }

      $value = (string)trim($value);

      if (!empty($value)) {

        if ($key == 'ID') {

          continue;

        } else if ($key == 'Brand') {
          $id_get = mysqli_query($conn, "SELECT id FROM tr_brands WHERE `name` = '" . mysqli_real_escape_string($conn, $value) . "'");
          $id = mysqli_fetch_assoc($id_get);
          $brandId = $id['id'];

        } else if ($key == 'Model') {

          $id_get = mysqli_query($conn, "SELECT id FROM tr_models WHERE `name` = '" . mysqli_real_escape_string($conn, $value) . "'");
          $id = mysqli_fetch_assoc($id_get);
          $modelId = $id['id'];

        } else if ($key == 'YEAR RANGE') {

          $id_get = mysqli_query($conn, "SELECT id FROM tr_years WHERE `name` = '" . mysqli_real_escape_string($conn, $value) . "'");
          $id = mysqli_fetch_assoc($id_get);
          $yearId = $id['id'];

        } else if ($key == 'ENGINE & HP') {

          $id_get = mysqli_query($conn, "SELECT id FROM tr_types WHERE `name` = '" . mysqli_real_escape_string($conn, $value) . "'");
          $id = mysqli_fetch_assoc($id_get);
          $typeId = $id['id'];

        } else {

          $extrasql .= sprintf("(%d, '%s', '%s'),"
              , $sheetId
              , mysqli_real_escape_string($conn, trim($key))
              , mysqli_real_escape_string($conn, trim($value)));
        }
      }
    }

    if (!empty($brandId) && !empty($modelId) && !empty($yearId) && !empty($typeId)) {

      $stmt = $conn->prepare("INSERT INTO tr_base_data (`sheet_id`,`brand_id`,`model_id`,`year_id`,`type_id`) values(?,?,?,?,?)");
      $stmt->bind_param('sssss', $sheetId, $brandId, $modelId, $yearId, $typeId);
      $stmt->execute();
    }

    return $extrasql;

  }

  function checkOrCreatePricing($sheetName, $dataArr) {

    global $conn;

    $id_get = mysqli_query($conn, "SELECT id FROM tr_countries WHERE `name` = '$sheetName' LIMIT 1");
    $id = mysqli_fetch_array($id_get);
    $countryId = $id['id'];

    $extrasql = '';

    if (!empty($countryId)) {
      if (!empty($dataArr)) {
        foreach ($dataArr as $sheetId => $stages) {
          if (!empty($sheetId)) {

            foreach ($stages as $key => $value) {
              if ($key !== 'ID') {
                $id_get = mysqli_query($conn, "SELECT id FROM tr_stages WHERE `name` = '$key' LIMIT 1");
                $id = mysqli_fetch_array($id_get);
                $stageId = $id['id'];
                $stagePrice = $value;

                // $stmts = $conn->prepare("INSERT INTO tr_price_stage_country (`sheet_id`,`country_id`,`stage_id`,`price`) values(?,?,?,?)");
                // $stmts->bind_param('ssss', $sheetId, $countryId, $stageId, $stagePrice);
                // $stmts->execute();

                $extrasql .= sprintf("(%d, %d, %d, %d),"
                    , $sheetId, $countryId, $stageId, $stagePrice);
              }
            }

          }
        }
      }
    }

    return $extrasql;

  }

?>








