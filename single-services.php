<?php
  include('components/header.php');
  $meta_prefix = 'services_';
  $gain_value_1 = rwmb_meta($meta_prefix . 'gain_value_1');
  $gain_value_2 = rwmb_meta($meta_prefix . 'gain_value_2');
  $gain_unit_1 = rwmb_meta($meta_prefix . 'gain_unit_1');
  $gain_unit_2 = rwmb_meta($meta_prefix . 'gain_unit_2');
  if ($gain_value_1 && $gain_value_2) {
    $gain_values = array($gain_value_1, $gain_value_2);
  } else if ($gain_value_1) {
    $gain_values = array($gain_value_1);
  } else if ($gain_value_2) {
    $gain_values = array($gain_value_2);
  } else {
    $gain_values = 0;
  }
  include('components/banner-bg-image.php');
?>
  <div class="bg-texture banner banner--adjust py-3 py-5--lg">

    <?php if (!is_single($performance_tuning_id) && !is_single($eco_tuning_id)) { ?>
      <div class="grid-xsqueeze">
        <div class="grid txt-center txt-left--md banner__typical-gains">
          <div class="mb-3 mb-0--md grid__2-3rds--md grid__3-4ths--lg">
            <?php $post_type = get_post_type_object(get_post_type(get_queried_object()));?>
            <h1 class="h h--3"><span class="bg-dark-overlay px-2 display-ib"><a href="/<?=$post_type->rewrite['slug']?>/" class="txt-no-dec txt-nowrap"><?=$post_type->label?> &rarr;</a> <?php the_title(); ?></span></h1>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php if (is_single($performance_tuning_id)) { ?>
      <div id="jsGainsDetailPerformance">
        <div class="loading" data-js="loading"><div class="loading__viz"><i></i><i></i><i></i><i></i><i></i></div><div class="loading__txt">Loading</div></div>
        <?php if ($gain_values > 0) { ?>
          <div class="jsGainsDetailTypical hidden"><?php include('components/gains-typical.php'); ?></div>
        <?php } ?>
      </div>
    <?php } else if (is_single($eco_tuning_id)) { ?>
      <div id="jsGainsDetailEco">
        <div class="loading" data-js="loading"><div class="loading__viz"><i></i><i></i><i></i><i></i><i></i></div><div class="loading__txt">Loading</div></div>
        <?php if ($gain_values > 0) { ?>
          <div class="jsGainsDetailTypical hidden"><?php include('components/gains-typical.php'); ?></div>
        <?php } ?>
      </div>
    <?php } ?>

  </div>
  <div id="more"></div>
  <div id="jsPowergateCta"></div>
<?php
  include('components/form-generic.php');
  if (is_single($dpf_egr_id)) {
    include('components/how-steps.php');
  }
  include('components/video.php');
  include('components/detail-more-content.php');
  include('components/media-gallery.php');
  include('components/trust-us.php');
?>
  <div class="hidden--md-down">
    <?php include('components/form-contact.php'); ?>
  </div>
<?php
  $results_cat_field = rwmb_meta($meta_prefix . 'result_cats');
  $results_cat = isset($results_cat_field->name) ? $results_cat_field : '';
  $testimonial_prefix = 'services_';
  include('components/results-and-testimonial.php');
  include('components/footer.php');
  include('components/foot.php');