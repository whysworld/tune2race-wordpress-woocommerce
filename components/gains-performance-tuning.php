<div class="display-js-b mt-4 mx-auto gains__stage-select">
  <label for="car-select-stage" class="display-b txt-bold mb-2">Select the stage</label>
  <select id="car-select-stage" data-js="enhance-select" data-js-expose="select" class="select--enhanced-sm">
    <option value="#jsPerfStage1">1. No modifications</option>
    <option value="#jsPerfStage2">2. Changed exhaust &amp; intake</option>
    <option value="#jsPerfStage3">3. Changed the turbo</option>
  </select>
</div>
<div id="jsPerfStage1" class="expose__content is-open" data-js-expose="select-content">
  <div class="grid display-flex--md mt-2 bg-black p-3--md gains__data">
    <div class="grid__3-4ths--md gains__table">
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
        <div class="grid__1-3rd txt-muted">Power</div>
        <div class="grid__1-3rd txt-muted"><?php the_gain($stock_hp, 'hp'); ?></div>
        <div class="grid__1-3rd txt-xbold"><?php the_gain($stage_1_hp_pre, 'hp'); ?></div>
      </div>
    </div>
    <div class="hidden--sm-down grid__1-4th--md grid bar-graph">
      <?php if ($stage_1_nm && $stage_1_hp) { ?>
        <div class="grid__half bar-graph__value" style="height: <?= get_gain_percent($stage_1_nm, $stage1_gain_values); ?>%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_1_nm?>nm</div>
        </div>
        <div class="grid__half bar-graph__value" style="height: <?= get_gain_percent($stage_1_hp, $stage1_gain_values) ?>%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_1_hp?>hp</div>
        </div>
      <?php } else { ?>
        <?php the_no_data_msg(); ?>
      <?php } ?>
    </div>
  </div>
</div>
<div id="jsPerfStage2" class="expose__content" data-js-expose="select-content">
  <div class="grid display-flex--md mt-2 bg-black p-3--md gains__data">
    <div class="grid__3-4ths--md gains__table">
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
        <div class="grid__1-3rd txt-muted">Power</div>
        <div class="grid__1-3rd txt-muted"><?php the_gain($stock_hp, 'hp'); ?></div>
        <div class="grid__1-3rd txt-xbold"><?php the_gain($stage_2_hp_pre, 'hp'); ?></div>
      </div>
    </div>
    <div class="hidden--sm-down grid__1-4th--md grid bar-graph">
      <?php if ($stage_2_nm && $stage_2_hp) { ?>
        <div class="grid__half bar-graph__value" style="height: <?= get_gain_percent($stage_2_nm, $stage2_gain_values); ?>%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_2_nm?>nm</div>
        </div>
        <div class="grid__half bar-graph__value" style="height: <?= get_gain_percent($stage_2_hp, $stage2_gain_values) ?>%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_2_hp?>hp</div>
        </div>
      <?php } else { ?>
        <?php the_no_data_msg(); ?>
      <?php } ?>
    </div>
  </div>
</div>
<div id="jsPerfStage3" class="expose__content" data-js-expose="select-content">
  <div class="grid display-flex--md mt-2 bg-black p-3--md gains__data">
    <div class="grid__3-4ths--md gains__table">
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
        <div class="grid__1-3rd txt-muted">Power</div>
        <div class="grid__1-3rd txt-muted"><?php the_gain($stock_hp, 'hp'); ?></div>
        <div class="grid__1-3rd txt-xbold"><?php the_gain($stage_3_hp_pre, 'hp'); ?></div>
      </div>
    </div>
    <div class="hidden--sm-down grid__1-4th--md grid bar-graph">
      <?php if ($stage_3_nm && $stage_3_hp) { ?>
        <div class="grid__half bar-graph__value" style="height: <?= get_gain_percent($stage_3_nm, $stage3_gain_values); ?>%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_3_nm?>nm</div>
        </div>
        <div class="grid__half bar-graph__value" style="height: <?= get_gain_percent($stage_3_hp, $stage3_gain_values) ?>%;">
          <div class="txt-xbold bar-graph__label">+<?=$stage_3_hp?>hp</div>
        </div>
      <?php } else { ?>
        <?php the_no_data_msg(); ?>
      <?php } ?>
    </div>
  </div>
</div>