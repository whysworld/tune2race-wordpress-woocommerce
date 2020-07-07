<div class="bg-texture bg-texture--grey txt-center py-4 p-4--md py-5--md results">
  <div class="grid mb-3 mb-4--md">
    <h2 class="h h--3 mt-5--lg">From Europe to South Africa, we have <span class="txt-nowrap">dealers globally</span>.</h2>
    <div class="mt-1 mt-0--md">And our results speak for themselves.</div>
  </div>
  <?php
  $tax_query = array('relation' => 'AND');
  if (!empty($results_cat)) {
    $tax_query[] = array(
      'taxonomy' => 'result_cats',
      'field'    => 'name',
      'terms'    => $results_cat,
    );
  }
  $result_args = array(
    'post_type'      => 'results',
    'posts_per_page' => 4,
    'tax_query'      => $tax_query
  );
  $results     = new WP_Query($result_args);
  ?>
  <?php if ($results->have_posts()) : ?>
    <div class="grid-squeeze bg-grey-xxdark txt-white txt-left--md px-5 py-3 py-4--md px-5--lg results__slides" data-js="results-carousel">
      <?php
      while ($results->have_posts()) : $results->the_post();
        $dynosheet_meta = rwmb_meta('results_dynosheet-file');
        $gain_value_1   = rwmb_meta('results_gain_value_1');
        $gain_value_2   = rwmb_meta('results_gain_value_2');
        $gain_unit_1    = rwmb_meta('results_gain_unit_1');
        $gain_unit_2    = rwmb_meta('results_gain_unit_2');
        $gain_values    = array($gain_value_1, $gain_value_2);
        ?>
        <div>
          <div class="py-3 px-5--md grid is-middled--lg results__slide-content">
            <div class="hidden--md-down grid__half--lg pr-4--lg">
              <img src="<?=get_the_post_thumbnail_url($post, 'results-image')?>" class="img-fluid">
            </div>
            <div class="grid__half--lg">
              <div class="grid display-flex--md">
                <div class="grid__half--md pr-3--lg">
                  <h2 class="h txt-xbold"><?php the_title(); ?></h2>
                  <div class="results__wp-content">
                    <?php the_content(); ?>
                  </div>
                  <?php
                  if (count($dynosheet_meta) > 0) {
                    ?>
                    <a href="<?=reset($dynosheet_meta)['url']?>" class="txt-no-dec"><span class="svg-bg svg-bg--car-white mr-1"></span><span class="display-ib display-mid">View dyno sheet</span></a>
                  <?php } ?>
                </div>
                <div class="mt-4 mt-0--md grid__half--md grid txt-center bar-graph">
                  <div class="grid__half bar-graph__value" style="height: <?=get_gain_percent($gain_value_1, $gain_values);?>%;">
                    <div class="txt-xbold bar-graph__label">+<?=$gain_value_1?><?=$gain_unit_1?></div>
                  </div>
                  <div class="grid__half bar-graph__value" style="height: <?=get_gain_percent($gain_value_2, $gain_values)?>%;">
                    <div class="txt-xbold bar-graph__label">+<?=$gain_value_2?><?=$gain_unit_2?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php
  endif;
  wp_reset_postdata();
  $testimonial_prefix    = isset($testimonial_prefix) ? $testimonial_prefix : '';
  $testimonial_cat_field = rwmb_meta($testimonial_prefix . 'testimonial_cats');
  if (is_object($testimonial_cat_field)) {
    $testimonial_cat = $testimonial_cat_field->name;
  }
  include('testimonial.php');
  ?>
</div>
