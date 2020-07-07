<?php
  include('components/header.php');
?>
  <div class="grid-xsqueeze my-3 my-5--lg px-4--xl">
    <h1 class="h h--1 mb-3 mb-4--md txt-center">Our Dealers</h1>
    <?php
      $meta_prefix = 'dealers_';
      if (have_posts()) : while (have_posts()) : the_post();
        $city = rwmb_meta($meta_prefix . 'city');
        $type = rwmb_meta($meta_prefix . 'type');
        $phone = rwmb_meta($meta_prefix . 'phone');
        $email = rwmb_meta($meta_prefix . 'email');
        $map = rwmb_meta($meta_prefix . 'map'); ?>
        <div class="grid bg-grey-xlight mb-3 mb-4--lg">
          <div class="grid__half--md">
            <div class="bg-grey-xlight">
              <iframe src="https://www.google.com/maps/d/u/1/embed?mid=<?=$map?>" width="100%" height="300" class="i-frame"></iframe>
            </div>
          </div>
          <div class="grid__half--md">
            <div class="p-3">
              <div class="grid">
                <div class="grid__1-3rd">
                  <img src="<?= get_the_post_thumbnail_url($post, 'small-thumb') ?>" alt="<?php the_title(); ?>" class="img-fluid">
                </div>
                <div class="grid__2-3rds">
                  <h1 class="h h--2"><?php the_title(); ?></h1>
                  <p class="mt-0"><?=$type?></p>
                  <ul class="ul ul--silent">
                    <li><a href="tel:<?=$phone?>"><?=$phone?></a></li>
                    <li><a href="mailto:<?=$email?>"><?=$email?></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; endif; ?>
  </div>
<?php
  include('components/footer.php');
  include('components/foot.php');
