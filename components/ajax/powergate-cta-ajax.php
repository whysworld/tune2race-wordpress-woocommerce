<?php
  require_once('head-ajax.php');

  if (is_powergate_enabled() && !is_dealer_country()) { ?>
  <div class="bg-texture bg-texture--grey txt-center py-4 py-5--md">
    <div class="grid-squeeze">
      <div class="mb-3"><a href="/powergate/" class="btn btn--green btn--sm txt-uppercase">New! DIY option</a></div>
      <h2 class="h h--2 txt-xbold">Take full control of your <?php the_car(true); ?> now by tuning it yourself.</h2>
      <p class="mt-1 mb-3 grid-xxsqueeze">We can help you get setup with the Powergate handheld device, which allows you to tune your own car safely and professionally.</p>
      <a href="/powergate/" class="btn btn--primary btn--lg">Find out more</a>
    </div>
  </div>
  <?php } ?>