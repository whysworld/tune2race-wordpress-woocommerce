<?php
  require_once('head-ajax.php');

  if (car_exists()) { ?>
    <a href="/your-gains/" class="btn btn--on-dark-alt mr-1 header__btns">
    <span class="svg-bg svg-bg--car-white mr-1"></span>
    <span class="display-ib display-mid txt-nowrap-ellipsis header__car"><?php the_car(); ?></span>
  </a>
<?php } else { ?>
  <a href="/select-your-car/" class="btn btn--on-dark-alt mr-1 header__btns"><span class="svg-bg svg-bg--car-white mr-1"></span> <span class="display-ib display-mid">Select your car</span></a>
<?php } ?>