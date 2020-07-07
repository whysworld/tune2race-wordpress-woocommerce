<?php
  require_once('head-ajax.php');
?>
<div data-js="expose-container">
  <?php if (car_exists()) { ?>
    <p class="jsContactCarSelect expose__content is-open txt-center txt-sm txt-bold line-through">
      <span class="display-ib px-3 bg-grey-xlight">
        Your car: <?php the_car(); ?>
        <a href="#" class="txt-xs" data-js="expose-toggle" data-js-expose-target=".jsContactCarSelect">[change]</a>
      </span>
    </p>
  <?php } ?>
  <div class="jsContactCarSelect expose__content <?php if (!car_exists()) { echo 'is-open'; } ?>">
    <label for="contact-brand" class="label">Your car (optional)</label>
    <div class="car-select__field is-active" data-js="car-select-field">
      <select id="jsCarSelectBrand" data-js="enhance-select" class="select--enhanced-sm select--enhanced-muted car-select__select" name="car-select-brand">
        <option value="-1" selected="selected">Select the brand</option>
        <?php foreach (get_brands() as $brand) { ?>
          <option value="<?=$brand->id?>"><?=$brand->name?></option>
        <?php } ?>
      </select>
    </div>
    <div class="mt-2 car-select__field" data-js="car-select-field">
      <select id="jsCarSelectModel" data-js="enhance-select" class="select--enhanced-sm select--enhanced-muted car-select__select" name="car-select-model">
        <option value="-1" selected="selected">Select the model</option>
      </select>
    </div>
    <div class="mt-2 car-select__field" data-js="car-select-field">
      <select id="jsCarSelectYear" data-js="enhance-select" class="select--enhanced-sm select--enhanced-muted car-select__select" name="car-select-year">
        <option value="-1" selected="selected">Select the year</option>
      </select>
    </div>
    <div class="mt-2 car-select__field" data-js="car-select-field">
      <select id="jsCarSelectType" data-js="enhance-select" class="select--enhanced-sm select--enhanced-muted car-select__select" name="car-select-type">
        <option value="-1" selected="selected">Select the engine type</option>
      </select>
    </div>
    <div class="txt-xs txt-bold txt-muted mb-3 px-1">Although optional, we can provide you with more efficient support if you supply details about your car.</div>
  </div>
  <input id="jsCarSetBrand" type="hidden" name="car-set-brand" value="<?=get_the_car_values()->brand?>">
  <input id="jsCarSetModel" type="hidden" name="car-set-model" value="<?=get_the_car_values()->model?>">
  <input id="jsCarSetYear" type="hidden" name="car-set-year" value="<?=get_the_car_values()->year?>">
  <input id="jsCarSetType" type="hidden" name="car-set-type" value="<?=get_the_car_values()->type?>">
</div>
