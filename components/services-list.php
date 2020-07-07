<?php
  $services = new WP_Query(array('post_type' => 'services'));
  if ($services->have_posts()) :
    while ($services->have_posts()) :
      $services->the_post();
      include('service-item.php');
    endwhile;
  endif;