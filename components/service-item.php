<div class="grid mt-3 mt-5--md service-item">
  <div class="grid-squeeze">
    <div class="mb-3 mb-0--lg grid__half--lg service-item__img">
      <a href="<?php the_permalink(); ?>"><img src="<?= get_the_post_thumbnail_url($post, 'service-list') ?>" class="img-fluid"></a>
    </div>
    <div class="grid__half--lg">
      <div class="mb-4">
        <h2 class="h h--2"><a href="<?php the_permalink(); ?>" class="txt-no-dec mr-2 txt-norm"><?php the_title(); ?></a> <a href="<?php the_permalink(); ?>" class="txt-sm txt-nowrap">find out more &rarr;</a></h2>
        <?=rwmb_meta('services_teaser')?>
      </div>
      <a href="<?php the_permalink(); ?>#contact" class="btn btn--sm mb-2">Contact us about this service</a>
    </div>
  </div>
</div>