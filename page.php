<?php
  include('components/header.php');
?>
  <div class="grid-xsqueeze my-3 my-5--lg px-4--xl">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="h h--1 txt-center"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  <?php endwhile; endif; ?>
  </div>
<?php
  include('components/footer.php');
  include('components/foot.php');
