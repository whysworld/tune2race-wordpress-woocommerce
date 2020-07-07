<?php require_once('head-ajax.php'); ?>

<form class="mx-1--lg display-ib display-mid header__btns" method="post">
  <select class="display-b select--enhanced-sm select--enhanced-muted-on-dark header__country-select" data-js="enhance-select" data-js-submit="select" name="country-select">
    <option value="-1">Select your country</option>
    <?php the_country_select_options() ?>
  </select>
</form>