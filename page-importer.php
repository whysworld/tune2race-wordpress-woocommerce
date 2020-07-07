<?php
  /**
   * Template Name: Car DB Importer
   */
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-latest.min.js" rel="script"></script>
</head>

<body>
<div id="wrap">
  <div class="container">
    <div class="row">

      <form class="form-horizontal" action="<?=get_template_directory_uri()?>/importer/tunedimporter.php" method="post" name="upload_excel" enctype="multipart/form-data">
        <fieldset>

          <!-- Form Name -->
          <legend></legend>

          <!-- File Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="filebutton">Select File</label>
            <div class="col-md-4">
              <input type="file" name="file" id="file" class="input-large">
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
            <div class="col-md-4">
              <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
            </div>
          </div>

        </fieldset>
      </form>

    </div>
  </div>
</div>
</body>

</html>