<?php
  require_once('head-ajax.php');

  if (!car_exists() || !is_powergate_enabled() || is_dealer_country()) { ?>
  <div class="bg-xxdark-overlay modal is-open">
    <div class="modal__screen">
      <div class="modal__content px-3">
      <?php if (!car_exists()) { ?>
        <form class="grid-xxsqueeze txt-center bg-white p-0" method="post" action="<?=get_site_url()?>/select-your-car/">
          <div class="h--3 bg-red-xdark txt-white p-2">No car selected</div>
          <div class="p-3">
            <p>To use the Powergate device, we first need to determine whether your car is compatible. Please select your car first.</p>
            <input type="hidden" name="destination" value="<?=get_site_url()?>/powergate/">
            <input type="hidden" name="cta-wording" value="View compatibility">
            <p><button type="submit" class="btn btn--primary px-4">Select your car</button></p>
          </div>
        </form>
      <?php } elseif (!is_powergate_enabled()) { ?>
        <form class="grid-xxsqueeze txt-center bg-white p-0" method="post" action="<?=get_site_url()?>/select-your-car/">
          <div class="h--3 bg-red-xdark txt-white p-2">Car not compatible</div>
          <div class="p-3">
            <p>Your selected car is not compatible with the Powergate device. If you think this is incorrect or would like to find out more, please <a href="<?=get_site_url()?>/contact-us/">contact us</a>.</p>
            <input type="hidden" name="destination" value="<?=get_site_url()?>/powergate/">
            <input type="hidden" name="cta-wording" value="View compatibility">
            <p><button type="submit" class="btn btn--primary px-4">Select a different car</button></p>
            <p>Or, <a href="<?=get_site_url()?>/services/">view our services &rarr;</a></p>
          </div>
        </form>
      <?php } elseif (is_dealer_country()) { ?>
        <div class="grid-xxsqueeze txt-center bg-white p-0">
          <div class="h--3 bg-red-xdark txt-white p-2">Not available in your country</div>
          <div class="p-3">
            <p>The Powergate device is not available in your country. However, we do have dealers in your country who would be happy to assist.</p>
            <p><a href="<?=get_site_url()?>/contact-us/" class="btn btn--primary px-4">Find a dealer near you</a></p>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
  <?php } ?>

