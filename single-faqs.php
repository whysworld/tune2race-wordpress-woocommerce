<?php
  include('components/header.php');
?>
  <div id="jsModalContent" class="grid-xsqueeze my-3 px-4--xl">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="h h--1 txt-center"><?php the_title(); ?></h1>
    <?php the_content(); ?>
  <?php endwhile; endif; ?>
    <div class="px-5 mt-5 txt-center">
      <div><a href="/contact-us/" class="btn px-4">Contact us</a></div>
      <div class="mt-3"><a href="javascript:history.go(-1)" data-js="modal-close-all" class="txt-xs txt-uppercase txt-muted txt-bold">Go back</a></div>
    </div>
  </div>
<?php
  include('components/footer.php');
  include('components/foot.php');
