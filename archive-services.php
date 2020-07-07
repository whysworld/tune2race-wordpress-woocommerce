<?php include('components/header.php'); ?>
  <div class="mb-3 mb-5--md">
    <?php if (have_posts()) :
      while (have_posts()) :
        the_post();
        include('components/service-item.php');
      endwhile;
    endif; ?>
  </div>
<?php
  include('components/trust-us.php');
  include('components/results-and-testimonial.php');
  include('components/footer.php');
  include('components/foot.php');
