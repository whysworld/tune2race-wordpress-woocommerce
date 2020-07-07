<?php
  /**
   * Template Name: Form sent
   */

  include('components/header.php');
  include('components/banner-bg-image.php');
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="grid-fluid bg-texture banner">
      <div class="banner__content">
        <h1 class="h h--1 txt-center mt-5 pt-5 mb-0">
          <span class="bg-dark-overlay px-2 display-ib">
            <span class="svg-bg svg-bg--tick-green mr-1"></span> <span class="display-mid display-ib"><?php the_title() ?></span>
          </span>
        </h1>
      </div>
    </div>
    <div class="grid-xsqueeze my-3 my-5--lg px-4--xl">
      <?php the_content(); ?>
    </div>
<?php
  endwhile; endif;
  include('components/footer.php');
  include('components/foot.php');
