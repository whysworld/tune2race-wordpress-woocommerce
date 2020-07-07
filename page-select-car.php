<?php
  /**
   * Template Name: Select car
   */

  include('components/header.php');
  include('components/banner-bg-image.php');
  ?>
  <div class="grid-fluid bg-texture banner banner--full">
    <?php
      $car_select_is_active = true;
      include('components/car-select.php');
    ?>
  </div>
<?php
  include('components/footer.php');
  include('components/foot.php');