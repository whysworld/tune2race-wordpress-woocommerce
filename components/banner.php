<div class="grid-fluid bg-texture banner <?php if (is_front_page() || is_home()) {echo 'banner--full';} ?>">
<?php if (is_front_page()) : ?>
  <?php include('car-select.php'); ?>
<?php else:
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="banner__content">
      <h1 class="h h--1 txt-center mt-5 pt-5 mb-0"><span class="bg-dark-overlay px-2 display-ib"><?php the_title() ?></span></h1>
    </div>
<?php endwhile; endif; endif; ?>
</div>