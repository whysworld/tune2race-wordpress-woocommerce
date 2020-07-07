<div class="display-js-b mt-4 mx-auto gains__stage-select">
  <label for="car-select-stage" class="display-b txt-bold mb-2">Select the stage</label>
  <select id="car-select-stage" data-js="enhance-select" data-js-expose="select" class="select--enhanced-sm">
    <option value="#jsEcoStage1">1. No modifications</option>
    <option value="#jsEcoStage2">2. Changed exhaust &amp; intake</option>
    <option value="#jsEcoStage3">3. Changed the turbo</option>
  </select>
</div>
<div id="jsEcoStage1" class="expose__content is-open" data-js-expose="select-content">
  <div class="grid display-flex--md mt-2 bg-black p-3--md gains__data">
    <div class="grid__5-6ths--md gains__table">
      <div class="grid">
        <div class="grid__1-3rd">&nbsp;</div>
        <div class="grid__1-3rd txt-muted">Original</div>
        <div class="grid__1-3rd txt-xbold">After</div>
      </div>
      <div class="grid">
        <div class="grid__1-3rd txt-muted">Torque</div>
        <div class="grid__1-3rd txt-muted"><?php the_gain($stock_nm, 'nm'); ?></div>
        <div class="grid__1-3rd txt-xbold"><?php the_gain($stage_1_nm_pre, 'nm'); ?></div>
      </div>
      <div class="grid">
        <div class="grid__full  txt-xbold">Estimated fuel reduction of <span class="txt-xs">+/-</span>10%</div>
      </div>
    </div>
    <div class="hidden--sm-down grid__1-6th--md grid bar-graph">
      <?php if ($stage_1_nm) { ?>
        <div class="grid__full bar-graph__value" style="height: 100%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_1_nm?>nm</div>
        </div>
      <?php } else { ?>
        <?php the_no_data_msg(); ?>
      <?php } ?>
    </div>
  </div>
</div>
<div id="jsEcoStage2" class="expose__content" data-js-expose="select-content">
  <div class="grid display-flex--md mt-2 bg-black p-3--md gains__data">
    <div class="grid__5-6ths--md gains__table">
      <div class="grid">
        <div class="grid__1-3rd">&nbsp;</div>
        <div class="grid__1-3rd txt-muted">Original</div>
        <div class="grid__1-3rd txt-xbold">After</div>
      </div>
      <div class="grid">
        <div class="grid__1-3rd txt-muted">Torque</div>
        <div class="grid__1-3rd txt-muted"><?php the_gain($stock_nm, 'nm'); ?></div>
        <div class="grid__1-3rd txt-xbold"><?php the_gain($stage_2_nm_pre, 'nm'); ?></div>
      </div>
      <div class="grid">
        <div class="grid__full  txt-xbold">Estimated fuel reduction of <span class="txt-xs">+/-</span>10%</div>
      </div>
    </div>
    <div class="hidden--sm-down grid__1-6th--md grid bar-graph">
      <?php if ($stage_2_nm) { ?>
        <div class="grid__full bar-graph__value" style="height: 100%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_2_nm?>nm</div>
        </div>
      <?php } else { ?>
        <?php the_no_data_msg(); ?>
      <?php } ?>
    </div>
  </div>
</div>
<div id="jsEcoStage3" class="expose__content" data-js-expose="select-content">
  <div class="grid display-flex--md mt-2 bg-black p-3--md gains__data">
    <div class="grid__5-6ths--md gains__table">
      <div class="grid">
        <div class="grid__1-3rd">&nbsp;</div>
        <div class="grid__1-3rd txt-muted">Original</div>
        <div class="grid__1-3rd txt-xbold">After</div>
      </div>
      <div class="grid">
        <div class="grid__1-3rd txt-muted">Torque</div>
        <div class="grid__1-3rd txt-muted"><?php the_gain($stock_nm, 'nm'); ?></div>
        <div class="grid__1-3rd txt-xbold"><?php the_gain($stage_3_nm_pre, 'nm'); ?></div>
      </div>
      <div class="grid">
        <div class="grid__full  txt-xbold">Estimated fuel reduction of <span class="txt-xs">+/-</span>10%</div>
      </div>
    </div>
    <div class="hidden--sm-down grid__1-6th--md grid bar-graph">
      <?php if ($stage_3_nm) { ?>
        <div class="grid__full bar-graph__value" style="height: 100%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_3_nm?>nm</div>
        </div>
      <?php } else { ?>
        <?php the_no_data_msg(); ?>
      <?php } ?>
    </div>
  </div>
</div>