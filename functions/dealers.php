<?php

  global $country_ip_clean_name, $country_db_rows, $dealer_clean_country_names;
  $country_ip_clean_name = sanitize_title(get_geo_ip_country());
  $country_db_rows = get_country_db_rows();
  $dealer_clean_country_names = get_clean_dealer_country_names();

  // if no country set, auto-detect and set
  if (!isset($_COOKIE['country_name']) || !isset($_COOKIE['country_id'])) {
    $name = $country_ip_clean_name;
    $id = array_search($name, $dealer_clean_country_names);
    $_COOKIE['country_id'] = $id;
    $_COOKIE['country_name'] = $name;
    set_country_cookie($id, $name);
  }

  // manual country select (overwrites auto-detect)
  if (isset($_POST['country-select']) && $_POST['country-select'] != '-1') {
    $id = $_POST['country-select'];
    $name = $dealer_clean_country_names[$id];
    $_COOKIE['country_id'] = $id;
    $_COOKIE['country_name'] = $name;
    set_country_cookie($id, $name);
  }

  function get_geo_ip_country() {
    return do_shortcode('[geoip_detect2 property="country"]');
  }

  function get_country_db_rows() {
    global $wpdb;
    return $wpdb->get_results("SELECT * FROM `tr_countries`");
  }

  function get_city_db_rows() {
    global $wpdb;
    return $wpdb->get_results("SELECT * FROM `tr_cities`");
  }

  function get_city_db_rows_in_country() {
    global $wpdb;
    $id = $_COOKIE['country_id'];
    $name = $_COOKIE['country_name'];
    if ($name == 'other') {
      return $wpdb->get_results("SELECT * FROM `tr_cities`");
    } else {
      return $wpdb->get_results("SELECT * FROM `tr_cities` WHERE `country_id` = $id");
    }
  }

  function get_clean_dealer_country_names() {
    global $country_db_rows;
    $country_names = array();
    foreach ($country_db_rows as $country_row) {
      $country_names[$country_row->id] = clean_country_name($country_row->name);
    }
    return $country_names;
  }

  function clean_country_name($string) {
    $sans_currency = preg_replace("/\([^)]+\)/", "", $string); //TODO: update model to not include currency in name, as parsing is fragile
    return sanitize_title($sans_currency);
  }

  function set_country_cookie($id, $name) {
    setcookie('country_id', $id, time() + (86400), "/"); // 86400 = 24 hours
    setcookie('country_name', $name, time() + (86400), "/");
  }

  function is_dealer_country() {
    global $dealer_clean_country_names;
    foreach ($dealer_clean_country_names as $country_name) {
      if ($country_name == $_COOKIE['country_name'] && $country_name != 'other') {
        return true;
      }
    }
    return false;
  }

  function does_country_match($country_name) {
    global $country_ip_clean_name;
    $country = isset($_COOKIE['country_name']) ? $_COOKIE['country_name'] : $country_ip_clean_name;
    return clean_country_name($country_name) == $country;
  }

  function the_country_select_options() {
    global $country_db_rows;
    foreach ($country_db_rows as $country_row) {
      $selected = does_country_match($country_row->name) ? ' selected="selected"' : '';
      echo '<option value="' . $country_row->id . '"' . $selected . '>' . $country_row->name . '</option>';
    }
  }

  function the_city_select_options() {
    foreach (get_city_db_rows_in_country() as $city_row) {
      echo '<option value=".jsDealerCity' . $city_row->id . '">' . $city_row->name . '</option>';
    }
  }