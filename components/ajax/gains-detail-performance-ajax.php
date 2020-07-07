<?php
  require_once('head-ajax.php');

  if (car_exists()) { ?>
    <div class="grid-xsqueeze p-0 px-3--md">
    <div class="bg-dark-overlay p-3">
      <div class="grid txt-center txt-left--lg">
        <div class="grid__half--lg mb-3 mb-0--lg">
          <h1 class="h h--3"><a href="/services/" class="txt-no-dec txt-nowrap">Services &rarr;</a> <?=get_the_title($performance_tuning_id)?></h1>
        </div>
        <div class="grid__half--lg txt-right--lg">
          For your <span class="txt-xbold"><?php the_car(); ?></span> <a href="/select-your-car/" class="btn btn--on-dark-alt btn--sm ml-2 my-1">Change</a>
        </div>
      </div>
      <div class="grid">
        <?php include('../gains-performance-tuning.php'); ?>
      </div>
      <div class="txt-center mt-4 mb-3">
        <a href="#more" class="btn btn--on-dark px-5--md">Find out more</a>
      </div>
    </div>
  </div>
<?php } ?>