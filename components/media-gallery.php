<?php
  if (!isset($media_gallery)) {
    $media_gallery = rwmb_meta($meta_prefix . 'gallery', array('size' => 'thumbnail'));
  }
  if (gettype($media_gallery) == 'array' && count($media_gallery) > 0) { ?>
    <div class="grid-xsqueeze mb-3">
      <div class="mt-3 media-gallery" data-js="media-gallery">
        <?php foreach ($media_gallery as $media_item) { ?>
            <div>
              <?php $video_id = rwmb_meta('media_video_id', '', $media_item['ID']); ?>
              <a
                  title="<?=$media_item['title']?>"
                  href="<?=$media_item['full_url']?>"
                  class="media-gallery__item<?php echo $video_id ? ' is-video-link' : ''; ?>"
                  data-js="modal-toggle"
                  data-js-modal="#<?=$media_item['ID']?>"
                  <?php if ($video_id) { ?>
                    data-js-modal-video="<?=$video_id?>"
                  <?php } else {?>
                    data-js-modal-image="<?=$media_item['full_url']?>"
                  <?php } ?>
              >
                <img src="<?=$media_item['url']?>" class="img-fluid" alt="<?=$media_item['title']?>">
              </a>
              <div class="txt-xs txt-muted px-3 mt-2"><?=$media_item['caption']?></div>
            </div>
          <?php } ?>
      </div>
    </div>
    <?php foreach ($media_gallery as $media_item) { ?>
      <?php $video_id = rwmb_meta('media_video_id', '', $media_item['ID']); ?>
      <div id="<?=$media_item['ID']?>" class="bg-xxdark-overlay modal" data-js="modal">
        <a href="#" class="bg-dark-overlay modal__close" data-js="modal-close" data-js-modal="#<?=$media_item['ID']?>"><span class="svg-bg svg-bg--x">close</span></a>
        <div class="modal__screen">
          <div class="modal__content" data-js="modal-content">
            <div class="grid-fluid txt-center">
              <?php if ($video_id) { ?>
                <div class="video-embed">
                  <iframe class="video-embed__iframe" data-js-modal="video" data-js-video-root-url="https://www.youtube.com/embed/" data-js-video-params="?rel=0&amp;showinfo=0&amp;disablekb=1" frameborder="0" allow="autoplay; encrypted-media" scrolling="no-scrolling" allowfullscreen></iframe>
                </div>
              <?php } else { ?>
                <img class="img-respond modal__img" data-js-modal="image" data-js="modal-close" data-js-modal="#<?=$media_item['ID']?>">
              <?php } ?>
              <div class="grid-xsqueeze txt-xs txt-white mt-2 mb-3"><?=$media_item['caption']?></div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php } ?>