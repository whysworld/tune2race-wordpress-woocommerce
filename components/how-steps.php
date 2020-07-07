<div class="txt-center">
  <h1 class="h h--1 mb-4"><?=rwmb_meta($meta_prefix . 'how_headline')?></h1>
  <div class="grid">
    <div class="grid__1-3rd--md">
      <?php
      $images = rwmb_meta($meta_prefix . 'how_image_1', array('size' => 'thumbnail'));
      if (gettype($images) == 'array' && count($images) > 0) {
        $image  = reset($images); ?>
        <div><img src="<?=$image['url']?>" class="img-fluid" alt="<?=$image['title']?>"></div>
      <?php } ?>
      <h2 class="h h--2 mt-3"><?=rwmb_meta($meta_prefix . 'how_headline_1')?></h2>
      <p class="txt-left"><?=rwmb_meta($meta_prefix . 'how_copy_1')?></p>
    </div>
    <div class="grid__1-3rd--md">
      <?php
      $images = rwmb_meta($meta_prefix . 'how_image_2', array('size' => 'thumbnail'));
      if (gettype($images) == 'array' && count($images) > 0) {
        $image  = reset($images); ?>
        <div><img src="<?=$image['url']?>" class="img-fluid" alt="<?=$image['title']?>"></div>
      <?php } ?>
      <h2 class="h h--2 mt-3"><?=rwmb_meta($meta_prefix . 'how_headline_2')?></h2>
      <p class="txt-left"><?=rwmb_meta($meta_prefix . 'how_copy_2')?></p>
    </div>
    <div class="grid__1-3rd--md">
      <?php
      $images = rwmb_meta($meta_prefix . 'how_image_3', array('size' => 'thumbnail'));
      if (gettype($images) == 'array' && count($images) > 0) {
        $image  = reset($images); ?>
        <div><img src="<?=$image['url']?>" class="img-fluid" alt="<?=$image['title']?>"></div>
      <?php } ?>
      <h2 class="h h--2 mt-3"><?=rwmb_meta($meta_prefix . 'how_headline_3')?></h2>
      <p class="txt-left"><?=rwmb_meta($meta_prefix . 'how_copy_3')?></p>
    </div>
  </div>
</div>