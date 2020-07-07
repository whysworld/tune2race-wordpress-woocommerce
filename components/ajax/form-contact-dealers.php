<?php
  require_once('head-ajax.php');
?>
<h2 class="h h--3 txt-xbold mb-3">Or ask one of our mechanics closest to you</h2>
<select id="contact-dealer" class="select--enhanced-sm select--enhanced-muted" data-js="enhance-select" data-js-expose="select">
  <?php the_city_select_options(); ?>
</select>
<?php
  $meta_prefix = 'dealers_';
  $dealers = new WP_Query(array('post_type' => 'dealers', 'posts_per_page' => -1));
  if ($dealers->have_posts()) : while ($dealers->have_posts()) : $dealers->the_post();
    $city = rwmb_meta($meta_prefix . 'city');
    $type = rwmb_meta($meta_prefix . 'type');
    $phone = rwmb_meta($meta_prefix . 'phone');
    $email = rwmb_meta($meta_prefix . 'email');
    $map = rwmb_meta($meta_prefix . 'map'); ?>
    <div class="jsDealerCity<?=$city?> expose__content-map" data-js-expose="select-content">
      <div class="bg-grey-xlight pointer mt-3 grid p-3">
        <div class="grid">
          <div class="grid__1-3rd">
            <img src="<?= get_the_post_thumbnail_url($post, 'small-thumb') ?>" alt="<?php the_title(); ?>" class="img-fluid">
          </div>
          <div class="grid__2-3rds">
            <h2 class="h h--2"><?php the_title(); ?></h2>
            <p class="mt-0"><?=$type?></p>
            <ul class="ul ul--silent">
              <li><a href="tel:<?=$phone?>"><?=$phone?></a></li>
              <li><a href="mailto:<?=$email?>"><?=$email?></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="bg-grey-xlight">
        <iframe src="https://www.google.com/maps/d/u/1/embed?mid=<?=$map?>" width="100%" height="470" class="i-frame"></iframe>
      </div>
    </div>
  <?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>
