<?php $car_select_is_active = isset($car_select_is_active) ? $car_select_is_active : false; ?>

<form class="display-js-b car-select car-select--banner <?php if ($car_select_is_active) { echo 'is-active'; }?>" data-js="car-select-banner" method="post">
  <label for="jsCarSelectBrand" class="display-b mb-3">
    <span class="h h--1 car-select__label-start">Increase your car's performance</span>
    <span class="h h--3 car-select__label-started txt-xbold">Select your car</span>
  </label>
  <div class="mb-2 car-select__field is-active" data-js="car-select-field">
    <select id="jsCarSelectBrand" data-js="enhance-select" class="car-select__select" name="car-select-brand">
      <option value="-1" selected="selected">
        <?php if ($car_select_is_active) {
          echo 'Select the brand';
        } else {
          echo 'Select your car';
        }
        ?>
      </option>
      <?php foreach (get_brands() as $brand) { ?>
          <option value="<?=$brand->id?>"><?=$brand->name?></option>
        <?php } ?>
    </select>
  </div>
  <div class="mb-2 car-select__field" data-js="car-select-field">
    <select id="jsCarSelectModel" data-js="enhance-select" class="car-select__select" name="car-select-model">
      <option value="-1" selected="selected">Select the model</option>
    </select>
  </div>
  <div class="mb-2 car-select__field" data-js="car-select-field">
    <select id="jsCarSelectYear" data-js="enhance-select" class="car-select__select" name="car-select-year">
      <option value="-1" selected="selected">Select the year</option>
    </select>
  </div>
  <div class="mb-4 car-select__field" data-js="car-select-field">
    <select id="jsCarSelectType" data-js="enhance-select" class="car-select__select" name="car-select-type">
      <option value="-1" selected="selected">Select the engine type</option>
    </select>
  </div>
  <div id="jsCarSelectSubmit" class="txt-center car-select__field" data-js="car-select-field">
    <?php $cta_wording = isset($_POST['cta-wording']) ? $_POST['cta-wording'] : 'View performance gains'; ?>
    <button class="btn btn--on-dark txt-xbold py-2 px-3 px-5--md" type="submit"><?=$cta_wording?></button>
  </div>
  <input type="hidden" name="t2r-action" value="submit_car_selection">
  <?php $destination = isset($_POST['destination']) ? $_POST['destination'] : get_site_url() . '/your-gains/'; ?>
  <input type="hidden" name="destination" value="<?=$destination?>">
  <input id="jsCarSetBrand" type="hidden" name="car-set-brand">
  <input id="jsCarSetModel" type="hidden" name="car-set-model">
  <input id="jsCarSetYear" type="hidden" name="car-set-year">
  <input id="jsCarSetType" type="hidden" name="car-set-type">
</form>