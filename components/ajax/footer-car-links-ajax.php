<?php require_once('head-ajax.php'); ?>

<li><a href="/select-your-car/" class="txt-white txt-no-dec"><?php echo car_exists() ? 'Change your car' : 'Select your car'; ?></a></li>
<li><a href="<?php echo car_exists() ? '/your-gains/' : '/select-your-car/'; ?>" class="txt-white txt-no-dec">Performance gains</a></li>
<li><a href="/contact-us/" class="txt-white txt-no-dec">Find a dealer</a></li>