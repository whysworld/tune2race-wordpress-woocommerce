<div class="grid-xsqueeze">
  <div class="grid txt-center txt-left--md banner__typical-gains">
    <div class="mb-3 mb-0--md grid__2-3rds--md grid__3-4ths--lg">
      <h1 class="h h--3"><span class="bg-dark-overlay px-2 display-ib"><a href="/services/" class="txt-no-dec txt-nowrap">Services &rarr;</a> <?php the_title(); ?></span></h1>
    </div>
    <div class="grid__1-3rd--md grid__1-4th--lg bg-dark-overlay px-3 txt-center">
      <div class="txt-uppercase txt-xs txt-white pt-2">Typical gains</div>
      <div class="bar-graph">
        <?php if ($gain_value_1) { ?>
          <div class="<?php if ($gain_value_2) { echo 'grid__half'; } else { echo 'grid__full'; } ?> bar-graph__value" style="height: <?= get_gain_percent($gain_value_1, $gain_values); ?>%;">
            <div class="txt-xbold bar-graph__label">+<?= $gain_value_1 ?><?= $gain_unit_1 ?></div>
          </div>
        <?php }
          if ($gain_value_2) { ?>
            <div class="<?php if ($gain_value_1) { echo 'grid__half'; } else { echo 'grid__full'; } ?> bar-graph__value" style="height: <?= get_gain_percent($gain_value_2, $gain_values) ?>%;">
              <div class="txt-xbold bar-graph__label">+<?= $gain_value_2 ?><?= $gain_unit_2 ?></div>
            </div>
          <?php } ?>
      </div>
      <a href="/select-your-car/" class="btn btn--on-dark btn--block btn--sm my-3">Select car for actual gains</a>
    </div>
  </div>
</div>