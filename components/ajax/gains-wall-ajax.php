<?php
  require_once('head-ajax.php');

  if (!car_exists()) { ?>
  <div class="bg-xxdark-overlay modal is-open">
    <div class="modal__screen">
      <div class="modal__content px-3">
        <form class="grid-xxsqueeze txt-center bg-white p-0" method="post" action="<?=get_site_url()?>/select-your-car/">
          <div class="h--3 bg-red-xdark txt-white p-2">No car selected</div>
          <div class="p-3">
            <p>To view performance gains, please select your car first.</p>
            <input type="hidden" name="destination" value="<?=get_site_url()?>/your-gains/">
            <p><button type="submit" class="btn btn--primary px-4">Select your car</button></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>

