<?php
  function get_gain_percent($value, $values) {
    return ($value / max($values)) * 100;
  }

  function get_cookie_array($cookie) {
    return json_decode(stripslashes($cookie));
  }