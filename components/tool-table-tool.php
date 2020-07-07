<div class="txt-sm">
  <?php
  $images = rwmb_meta($meta_prefix . $tool . '_image', array('size' => 'small-thumb'));
  $image = reset($images);
  if (gettype($image) == 'array' && count($image) > 0) { ?>
    <a
      title="<?=$image['title']?>"
      href="<?=$image['full_url']?>"
      class="tool-table__image-link media-gallery__item"
      data-js="modal-toggle"
      data-js-modal="#<?=$image['ID']?>"
      data-js-modal-image="<?=$image['full_url']?>"
    >
      <img src="<?=$image['url']?>" class="img-respond" alt="<?=$image['title']?>">
    </a>
    <div id="<?=$image['ID']?>" class="bg-xxdark-overlay modal" data-js="modal">
      <a href="#" class="bg-dark-overlay modal__close" data-js="modal-close" data-js-modal="#<?=$image['ID']?>"><span class="svg-bg svg-bg--x">close</span></a>
      <div class="modal__screen">
        <div class="modal__content" data-js="modal-content">
          <div class="grid-fluid txt-center">
            <img class="img-respond modal__img" data-js-modal="image" data-js="modal-close" data-js-modal="#<?=$image['ID']?>">
            <div class="grid-xsqueeze txt-xs txt-white mt-2 mb-3"><?=$image['caption']?></div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php
    $video = rwmb_meta($meta_prefix . $tool . '_video');
    $lists = rwmb_meta( $meta_prefix . $tool . '_list' );
    $list = reset($lists)['url'];
    if (strlen($video) > 10) { ?>
      <p>
        <a
          href="https://youtu.be/<?=rwmb_meta($meta_prefix . $tool . '_video')?>"
          data-js="modal-toggle"
          data-js-modal="#<?=rwmb_meta($meta_prefix . $tool . '_video')?>"
          data-js-modal-video="<?=rwmb_meta($meta_prefix . $tool . '_video')?>"
        >
          Intro video
        </a>
        <div id="<?=rwmb_meta($meta_prefix . $tool . '_video')?>" class="bg-xxdark-overlay modal" data-js="modal">
          <a href="#" class="bg-dark-overlay modal__close" data-js="modal-close" data-js-modal="#<?=rwmb_meta($meta_prefix . $tool . '_video')?>"><span class="svg-bg svg-bg--x">close</span></a>
          <div class="modal__screen">
            <div class="modal__content" data-js="modal-content">
              <div class="grid-fluid txt-center">
                <div class="video-embed">
                  <iframe class="video-embed__iframe" data-js-modal="video" data-js-video-root-url="https://www.youtube.com/embed/" data-js-video-params="?rel=0&amp;showinfo=0&amp;disablekb=1" frameborder="0" allow="autoplay; encrypted-media" scrolling="no-scrolling" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </p>
    <?php } else { ?>
      <p>&nbsp;</p>
    <?php } if (strlen($list) > 10) { ?>
      <p><a href="<?=$list?>">Download vehicle list</a></p>
    <?php } else { ?>
      <p>&nbsp;</p>
    <?php } ?>
  <div class="tool-table__divider tool-table__dsg">
    <span class="hidden--xl-up mr-2 display-mid display-ib--xl">DSG Tuning:</span>
    <?=$dsg_available?>
  </div>
  <div class="tool-table__divider tool-table__types">
    You can tune
    <div class="jsSlaveOptions expose__content is-open" data-js-expose="select-content">
      <div class="jsSlaveProtocols" data-js-expose="select-container">
        <?php the_protocol_descriptions($slave_tools); ?>
      </div>
    </div>
    <div class="jsMasterOptions expose__content" data-js-expose="select-content">
      <div class="jsMasterProtocols" data-js-expose="select-container">
        <?php the_protocol_descriptions($master_tools); ?>
      </div>
    </div>
  </div>
  <div class="tool-table__divider tool-table__device">
    <div class="jsSlaveOptions expose__content is-open" data-js-expose="select-content">
      <ul class="ul txt-left">
        <li>Become a Tuned2Race agent</li>
        <li>Sell under our brand or your own brand</li>
        <li>Get tuning files within 15-60 minutes</li>
        <li>Free training</li>
      </ul>
    </div>
    <div class="jsMasterOptions expose__content" data-js-expose="select-content">
      <ul class="ul txt-left">
        <li>Sell under your own brand</li>
        <li>No training</li>
        <li>Make your own files</li>
      </ul>
    </div>
  </div>
  <div class="txt-black txt-bold tool-table__divider">
    <span class="hidden--xl-up txt-black txt-bold">Annual licence:</span>
    <span class="jsSlaveOptions expose__content is-open" data-js-expose="select-content"><?=$slave_licence_fees->{$tool}?></span>
    <span class="jsMasterOptions expose__content" data-js-expose="select-content"><?=$master_licence_fees->{$tool}?></span>
  </div>
  <div class="txt-black tool-table__divider">
    <div class="jsSlaveOptions expose__content is-open" data-js-expose="select-content">
      <div class="jsSlaveProtocols" data-js-expose="select-container">
        <?php the_tool_prices($slave_tools, $tool); ?>
        <?php the_tool_sale_prices($slave_tools, $tool . '_sale'); ?>
      </div>
    </div>
    <div class="jsMasterOptions expose__content" data-js-expose="select-content">
      <div class="jsMasterProtocols" data-js-expose="select-container">
        <?php the_tool_prices($master_tools, $tool); ?>
        <?php the_tool_sale_prices($master_tools, $tool . '_sale'); ?>
      </div>
    </div>
    <div class="txt-italic">Free 1 year licence</div>
    <p><a href="#enquire" class="btn btn--block">Enquire now</a></p>
    <div>
      <span class="svg-bg svg-bg--ssl mr-2">SSL Secure</span>
      <span class="svg-bg svg-bg--money-back-dark mr-2">Money back guarantee</span>
    </div>
  </div>
</div>