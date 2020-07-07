<?php
  $tax_query = array( 'relation' => 'AND' );
  if ( isset( $testimonial_cat ) ) {
    $tax_query[] = array(
        'taxonomy' => 'testimonial_cats',
        'field'    => 'name',
        'terms'    => $testimonial_cat,
    );
  }
  $testimonial_args = array(
      'post_type'      => 'testimonials',
      'posts_per_page' => 1,
      'tax_query'      => $tax_query
  );
  $testimonials = new WP_Query( $testimonial_args );
?>
<?php if ( $testimonials->have_posts() ) : ?>
  <div class="grid grid__2-3rds--md is-centered mt-4 mt-5--lg results__testimonial">
    <?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
      <blockquote class="block-quote">
        "<?= wp_strip_all_tags(get_the_content()); ?>"
      </blockquote>
      <p class="txt-italic txt-bold mb-0">&mdash; <?php the_title(); ?></p>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
