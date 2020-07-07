<?php include('components/header.php'); ?>
  <div class="mb-3 mb-5--md">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="grid mt-3 mt-5--md service-item">
        <div class="grid-squeeze">
          <div class="mb-3 mb-0--lg grid__half--lg service-item__img">
            <a href="<?php the_permalink(); ?>"><img src="<?= get_the_post_thumbnail_url($post, 'service-list') ?>" class="img-fluid"></a>
          </div>
          <div class="grid__half--lg">
            <div class="mb-4">
              <h2 class="h h--2"><a href="<?php the_permalink(); ?>" class="txt-no-dec mr-2 txt-norm"><?php the_title(); ?></a> <a href="<?php the_permalink(); ?>" class="txt-sm txt-nowrap">find out more &rarr;</a></h2>
              <?=rwmb_meta('campaigns_summary_copy')?>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; endif; ?>
  </div>
<?php
  include('components/trust-us.php');
  include('components/results-and-testimonial.php');
  include('components/footer.php');
  include('components/foot.php');
