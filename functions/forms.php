<?php

  global $form_error;
  $form_error = false;

  if (isset($_POST['t2r-action'])) {
    $function = $_POST['t2r-action'];
    $function();
  }

  function submit_car_selection() {
    save_car_selection();
    wp_redirect($_POST['destination']);
    exit;
  }

  function car_info_to_submit() {
    $car_info_to_submit = new stdClass;
    // if user has manually (re)selected car in form
    if (isset($_POST['car-select-brand']) && $_POST['car-select-brand'] != '-1') {
      $car_info_to_submit->brand = $_POST['car-set-brand'];
      $car_info_to_submit->model = $_POST['car-select-model'] != '-1' ? $_POST['car-set-model'] : '';
      $car_info_to_submit->year = $_POST['car-select-year'] != '-1' ? $_POST['car-set-year'] : '';
      $car_info_to_submit->type = $_POST['car-select-type'] != '-1' ? $_POST['car-set-type'] : '';
    }
    // only save car selection if all car fields have been selected (if type is defined correctly, all others will be):
    if (isset($_POST['car-set-type']) && $_POST['car-select-type'] != '-1') {
      save_car_selection();
    }
    $car_select_brand = isset($_POST['car-select-brand']) ? $_POST['car-select-brand'] : '-1';
    if (car_exists() && $car_select_brand == '-1') {
      // if no manual reselection of car happens, populate with preexisting selection
      global $car_values_cookie;
      $car_info_to_submit = get_cookie_array($car_values_cookie);
    }
    return $car_info_to_submit;
  }

  function submit_contact_form() {
    global $form_error;
    $car_info_to_submit = car_info_to_submit();
    if (save_contact_form($car_info_to_submit)) {
      wp_redirect($_POST['destination']);
      exit;
    } else {
      $form_error = true;
    }
  }

  function save_contact_form($car_info) {
    global $current_user;
    $min_fields = false;
    $compulsory_contact_fields = array('contact-name', 'contact-email', 'contact-city');
    foreach ($compulsory_contact_fields as $field) {
      if (empty($_POST[$field]) || !filter_var($_POST['contact-email'], FILTER_VALIDATE_EMAIL)) {
        $min_fields = false;
        break;
      } else {
        $min_fields = true;
      }
    }
    //insert wp comment
    $car_brand = isset($car_info->brand) ? $car_info->brand : '';
    $car_model = isset($car_info->model) ? $car_info->model : '';
    $car_year = isset($car_info->year) ? $car_info->year : '';
    $car_type = isset($car_info->type) ? $car_info->type : '';
    $wp_comment_content = empty($_POST['contact-service']) ? '' : '<p>Regarding: ' . $_POST['contact-service'] . '</p>';
    $wp_comment_content .= empty($_POST['powergate-option']) ? '' : '<p>Powergate option: ' . $_POST['powergate-option'] . '</p>';
    $wp_comment_content .= empty($_POST['contact-tel']) ? '' : '<p>Contact number: ' . $_POST['contact-tel'] . '</p>';
    $wp_comment_content .= '<p>Closest city: ' . $_POST['contact-city'] . '</p>';
    $wp_comment_content .= '<p>Country selected: ' .$_COOKIE['country_name'] . ' [IP location: ' . get_geo_ip_country() . ']</p>';
    if ($car_brand !== '') {
      $wp_comment_content .= '<p>Car: ' . $car_brand . ' ' . $car_model . ' ' . $car_year . ' ' . $car_type . '</p>';
    }
    $wp_comment_content .= empty($_POST['contact-msg']) ? '' : '<p>Message:</p><p>' . $_POST['contact-msg'] . '</p>';
    $wp_comment_content .= '<p>Sent from: ' . $_SERVER['HTTP_REFERER'] . '</p>';
    if ($min_fields) {
      $comment_data = array(
          'comment_post_ID' => 35,  //contact page
          'comment_author' => $_POST['contact-name'],
          'comment_author_email' => $_POST['contact-email'],
          'comment_author_url' => '',
          'comment_content' => wpautop($wp_comment_content),
          'comment_type' => '',
          'comment_parent' => 0,
          'user_id' => $current_user->ID,
      );
      //Insert new comment
      $comment_id = wp_new_comment($comment_data);
      if ($comment_id) {
        return true;
      }
    }
  }

  function field_error_style($are_errors, $is_form, $name, $validation) {
    if ($are_errors && $is_form == $_POST['which-form']) {
      if ($validation == 'required' && empty($_POST[$name])) {
        echo 'has-error';
      }
      if ($validation == 'email' && !filter_var($_POST[$name], FILTER_VALIDATE_EMAIL)) {
        echo 'has-error';
      }
    }
  }