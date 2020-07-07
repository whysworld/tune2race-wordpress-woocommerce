<?php
  $meta_prefix = "campaigns_";
  include('components/header.php');
  include('components/banner-bg-image.php');
  include('components/banner.php');
  $form_prefix = 'campaigns_';
  include('components/form-generic.php');
  include('components/video.php');
  include('components/detail-more-content.php');
  include('components/media-gallery.php');
  include('components/trust-us.php');
  include('components/form-contact.php');
  $results_cat = rwmb_meta($meta_prefix . 'result_cats')->name;
  $testimonial_prefix = 'campaigns_';
  include('components/results-and-testimonial.php');
  include('components/footer.php');
  include('components/foot.php');
