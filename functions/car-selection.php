<?php

  global $car_values_cookie, $car_ids_cookie;
  if (isset($_COOKIE['car_selected_values'])) {
    $car_values_cookie = $_COOKIE['car_selected_values'];
  }
  if (isset($_COOKIE['car_selected_ids'])) {
    $car_ids_cookie = $_COOKIE['car_selected_ids'];
  }
  $car_meta = get_car_meta();
  if (count($car_meta) > 0) {
    $stock_nm = isset($car_meta["STOCK-NM"]) ? $car_meta["STOCK-NM"] : '';
    $stock_hp = isset($car_meta["HP"]) ? $car_meta["HP"] : '';

    $stage_1_nm_pre = isset($car_meta["STAGE1-NM"]) ? $car_meta["STAGE1-NM"] : '';
    $stage_1_hp_pre = isset($car_meta["STAGE1-HP"]) ? $car_meta["STAGE1-HP"] : '';
    $stage_1_nm = isset($car_meta["STAGE1-NM GAIN"]) ? $car_meta["STAGE1-NM GAIN"] : '';
    $stage_1_hp = isset($car_meta["STAGE1-HP GAIN"]) ? $car_meta["STAGE1-HP GAIN"] : '';

    $stage_2_nm_pre = isset($car_meta["STAGE2-NM"]) ? $car_meta["STAGE2-NM"] : '';
    $stage_2_hp_pre = isset($car_meta["STAGE2-HP"]) ? $car_meta["STAGE2-HP"] : '';
    $stage_2_nm = isset($car_meta["STAGE2-NM GAIN"]) ? $car_meta["STAGE2-NM GAIN"] : '';
    $stage_2_hp = isset($car_meta["STAGE2-HP GAIN"]) ? $car_meta["STAGE2-HP GAIN"] : '';

    $stage_3_nm_pre = isset($car_meta["STAGE3-NM"]) ? $car_meta["STAGE3-NM"] : '';
    $stage_3_hp_pre = isset($car_meta["STAGE3-HP"]) ? $car_meta["STAGE3-HP"] : '';
    $stage_3_nm = isset($car_meta["STAGE3-NM GAIN"]) ? $car_meta["STAGE3-NM GAIN"] : '';
    $stage_3_hp = isset($car_meta["STAGE3-HP GAIN"]) ? $car_meta["STAGE3-HP GAIN"] : '';

    $stage1_gain_values = array($stage_1_nm, $stage_1_hp);
    $stage2_gain_values = array($stage_2_nm, $stage_2_hp);
    $stage3_gain_values = array($stage_3_nm, $stage_3_hp);
  }

  function get_brands() {
    global $wpdb;
    return $wpdb->get_results("SELECT *, name FROM tr_brands");
  }

  function car_exists() {
    global $car_values_cookie;
    return isset($car_values_cookie);
  }

  function car_ids_exist() {
    global $car_ids_cookie;
    return isset($car_ids_cookie);
  }

  function the_car($brand_only = false) {
    global $car_values_cookie;
    if (car_exists()) {
      $car_values = get_cookie_array($car_values_cookie);
      echo $brand_only ? $car_values->brand : $car_values->brand . ' ' . $car_values->model;
    } else {
      echo 'car';
    }
  }

  function get_the_car_values() {
    global $car_values_cookie;
    if (car_exists()) {
      return get_cookie_array($car_values_cookie);
    }
  }

  function the_gain($gain, $unit) {
    if ($gain) {
      echo $gain . $unit;
    } else {
      echo '<a href="/contact-us/" class="txt-sm">Request data</a>';
    }
  }

  function the_no_data_msg() {
    echo '<span class="txt-sm txt-muted txt-italic">Currently no gains data for this stage of your car online. <a href="/contact-us/" class="txt-nowrap">Contact us</a> to get the data.</span>';
  }

  function get_car_meta() {
    global $car_ids_cookie;
    global $wpdb;
    $meta_values = array();
    if (car_ids_exist()) {
      $car_ids = get_cookie_array($car_ids_cookie);
      $meta_id = $wpdb->get_results("SELECT `sheet_id` FROM `tr_base_data` WHERE `brand_id` = $car_ids->brand AND `model_id` = $car_ids->model AND `year_id` = $car_ids->year AND `type_id` = $car_ids->type");
      $sheet_id = $meta_id[0]->sheet_id;
      $meta_data = $wpdb->get_results("SELECT `key`, `value` FROM `tr_meta_data` WHERE `sheet_id` = $sheet_id");
      foreach ($meta_data as $meta_row) {
        $meta_values[$meta_row->key] = $meta_row->value;
      }
    }
    return $meta_values;
  }

  function save_car_selection() {
    $id_array = array(
        'brand' => utf8_encode($_POST['car-select-brand']),
        'model' => utf8_encode($_POST['car-select-model']),
        'year' => utf8_encode($_POST['car-select-year']),
        'type' => utf8_encode($_POST['car-select-type'])
    );
    $value_array = array(
        'brand' => utf8_encode($_POST['car-set-brand']),
        'model' => utf8_encode($_POST['car-set-model']),
        'year' => utf8_encode($_POST['car-set-year']),
        'type' => utf8_encode($_POST['car-set-type'])
    );
    $id_string = json_encode($id_array);
    $value_string = json_encode($value_array);
    setcookie('car_selected_ids', $id_string, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie('car_selected_values', $value_string, time() + (86400 * 30), "/");
  }

  function is_powergate_enabled() {
    return isset(get_car_meta()["Powergate"]) && get_car_meta()["Powergate"] == '1';
  }