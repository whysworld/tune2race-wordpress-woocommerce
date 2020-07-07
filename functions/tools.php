<?php

  global $slave_tools, $master_tools, $slave_licence_fees, $master_licence_fees;

  $slave_tools = get_slave_tools();
  $master_tools = get_master_tools();
  $slave_licence_fees = get_licence_fees_db_rows('slave')[0];
  $master_licence_fees = get_licence_fees_db_rows('master')[0];

  function get_slave_db_rows() {
    global $wpdb;
    return $wpdb->get_results("SELECT * FROM `tr_tools_slave`");
  }

  function get_master_db_rows() {
    global $wpdb;
    return $wpdb->get_results("SELECT * FROM `tr_tools_master`");
  }

  function get_licence_fees_db_rows($type) {
    global $wpdb;
    return $wpdb->get_results("SELECT * FROM `tr_tools_licence_fees` WHERE `type` = '$type'");
  }

  function get_slave_tools() {
    $slave_tools = new stdClass;
    foreach (get_slave_db_rows() as $slave_row) {
      $slave_tools->{$slave_row->id} = $slave_row;
    }
    return $slave_tools;
  }

  function get_master_tools() {
    $master_tools = new stdClass;
    foreach (get_master_db_rows() as $master_row) {
      $master_tools->{$master_row->id} = $master_row;
    }
    return $master_tools;
  }

  function the_slave_select_options() {
    global $slave_tools;
    foreach ($slave_tools as $tool) {
      echo '<option value=".jsProtocol' . $tool->id . '">' . $tool->protocols . ' (slave)</option>';
    }
  }

  function the_master_select_options() {
    global $master_tools;
    foreach ($master_tools as $tool) {
      echo '<option value=".jsProtocol' . $tool->id . '">' . $tool->protocols . ' (master)</option>';
    }
  }

  function the_protocol_descriptions($tools) {
    foreach ($tools as $tool) {
      echo '<div class="txt-italic m-0 jsProtocol' . $tool->id . ' expose__content" data-js-expose="select-content">' . $tool->description . '</div>';
    }
  }

  function the_tool_prices($tools, $name) {
    $sale_name = $name . '_sale';
    foreach ($tools as $tool) {
      $strike = strlen($tool->{$sale_name}) > 0 ? 'txt-strike' : '';
      echo '<div class="h h--3 txt-xbold txt-black ' . $strike . ' jsProtocol' . $tool->id . ' expose__content" data-js-expose="select-content">' . $tool->{$name} . '</div>';
    }
  }

  function the_tool_sale_prices($tools, $name) {
    foreach ($tools as $tool) {
      echo '<div class="h h--2 txt-xbold txt-red jsProtocol' . $tool->id . ' expose__content" data-js-expose="select-content">' . $tool->{$name} . '</div>';
    }
  }

