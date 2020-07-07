<?php
  if ($_POST['which-form'] == 'car-select') {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
    $model_id = esc_sql($_POST['model-id']);
    $selected_id = esc_sql($_POST['selected-id']);
    $selected_column = esc_sql($_POST['selected-column']);
    $get_column = esc_sql($_POST['get-column']);
    $get_table = esc_sql($_POST['get-table']);
    if ($get_column == 'type_id') {
      // Model id is needed to get correct type (in addition to year)
      $corresponding_ids = $wpdb->get_results("SELECT `type_id` FROM tr_base_data WHERE `year_id`=$selected_id AND `model_id`=$model_id");
    } else {
      $corresponding_ids = $wpdb->get_results("SELECT DISTINCT $get_column, $get_column FROM tr_base_data WHERE $selected_column=$selected_id");
    }
    $corresponding_ids_flat = array();
    foreach ($corresponding_ids as $corresponding_id) {
      array_push($corresponding_ids_flat, $corresponding_id->$get_column);
    }
    echo json_encode($wpdb->get_results("SELECT *, `name` FROM $get_table WHERE id IN (" . implode(',', $corresponding_ids_flat) . ") GROUP BY `name`"));
  }