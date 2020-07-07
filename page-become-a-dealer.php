<?php
  /**
   * Template Name: Become a dealer
   */

  include('components/header.php');
  include('components/banner-bg-image.php');
  include('components/banner.php');
?>
  <div class="bg-texture bg-texture--grey txt-center py-4 hidden--sm-down">
    <div class="grid-xsqueeze">
      <img class="img-fluid" src="<?=get_template_directory_uri()?>/dist/assets/images/content/become-a-dealer-steps.png">
    </div>
  </div>
  <div class="grid-xsqueeze mt-3 mt-5--md txt-center">
    <h2 class="h h--2 txt-xbold">Fully setup tuning business within 7 days.</h2>
    <p class="mt-1 mb-3">Tune over 6000 cars, bikes, trucks, and boats.</p>
    <div class="h h--4 hidden--md-up">Get professionally tuned <strong class="txt-xbold">files within 15-60 min</strong>, and benefit from our <strong class="txt-xbold">international network</strong>.</div>
  </div>
  <div id="enquire"></div>
<?php
  $meta_prefix = "become_a_dealer_";
  $form_prefix = 'bad';
  include('components/form-generic.php');
  include('components/how-steps.php');
  include('components/detail-more-content.php');
  include('components/media-gallery.php');
?>
  <div id="tool-guide" class="grid my-3 my-5--lg txt-center" data-js-expose="select-container">
    <h1 class="h h--1">Tuning tools guide</h1>
    <div class="grid__half--lg is-centered mt-1">Use the guide below to see which tool suits your needs best. Alternatively, use our <a href="#" class="txt-nowrap">tool selector</a> <span class="txt-nowrap">for specific cars</span>. Or, schedule a <a href="#enquire">free consultation</a> if you're still not sure.</div>
    <div class="grid mt-4">
      <div class="grid__1-5th--xl mb-3 bg-grey-xlight txt-sm p-3 border-radius tool-table__key">
        <p class="hidden--lg-down">Tunable vehicles</p>
        <div class="hidden--lg-down tool-table__divider tool-table__dsg">DSG Tuning</div>
        <div class="hidden--lg-down tool-table__divider p-0"></div>
        <div class="tool-table__types py-3--xl">
          <label class="label mb-3" for="tool-table-cars">What do you want to tune?</label>
          <div class="jsSlaveOptions expose__content is-open" data-js-expose="select-content">
            <select id="tool-table-cars" class="select--enhanced-sm select--enhanced-muted" data-js="enhance-select" data-js-expose="select" data-js-expose-scope=".jsSlaveProtocols">
              <?php the_slave_select_options(); ?>
            </select>
          </div>
          <div class="jsMasterOptions expose__content" data-js-expose="select-content">
            <select id="tool-table-cars" class="select--enhanced-sm select--enhanced-muted" data-js="enhance-select" data-js-expose="select" data-js-expose-scope=".jsMasterProtocols">
              <?php the_master_select_options(); ?>
            </select>
          </div>
        </div>
        <div class="hidden--lg-down tool-table__divider p-0"></div>
        <div class="tool-table__device py-3--xl">
          <select class="select--enhanced-sm select--enhanced-muted" data-js="enhance-select" data-js-expose="select">
            <option value=".jsSlaveOptions">Slave device</option>
            <option value=".jsMasterOptions">Master device</option>
          </select>
          <div class="txt-xs txt-bold txt-muted px-1">We highly recommend slaves over masters. <a href="/faqs/master-vs-slave-chip-tuning-tools/" title="Master vs Slave" data-js="modal-toggle" data-js-modal="#jsFaqsModal" data-js-modal-html="/faqs/master-vs-slave-chip-tuning-tools/ #jsModalContent">Here's why</a>.</div>
          <div id="jsFaqsModal" class="bg-xxdark-overlay modal" data-js="modal">
            <a href="#" class="modal__close" data-js="modal-close" data-js-modal="#jsFaqsModal"><span class="svg-bg svg-bg--x">close</span></a>
            <div class="modal__screen">
              <div class="modal__content" data-js="modal-content">
                <div class="bg-white p-3 grid-xsqueeze" data-js="modal-html"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="hidden--lg-down tool-table__divider">
          <span class="txt-black txt-bold">Annual licence</span>
        </div>
        <div class="hidden--lg-down tool-table__divider"></div>
      </div>
      <div class="grid__4-5ths--xl">
        <div class="grid__half--lg bg-blue-xdark border-radius p-3">
          <div class="txt-white txt-bold"><span class="svg-bg svg-bg--tools-obd mx-2"></span> <span class="display-mid display-ib">OBD - Tune within 15 to 60 min</span></div>
          <div class="grid">
            <div class="mt-3 grid__half--md bg-grey-xlight border-radius p-2">
              <h3 class="h h--3 txt-xbold txt-black">Kess</h3>
              <p class="mt-0 txt-italic">By Alientech</p>
              <?php
                $tool = 'kess';
                $dsg_available = '<span class="svg-bg svg-bg--tick tool-table__tick">Yes</span>';
                include('components/tool-table-tool.php');
              ?>
            </div>
            <div class="mt-3 grid__half--md bg-grey-xlight border-radius p-2">
              <h3 class="h h--3 txt-xbold txt-black">CMD</h3>
              <p class="mt-0 txt-italic">By Flashtech</p>
              <?php
                $tool = 'cmd';
                include('components/tool-table-tool.php');
              ?>
            </div>
          </div>
        </div>
        <div class="grid__half--lg bg-red-xdark border-radius mt-3 mt-0--lg p-3">
          <div class="txt-white txt-bold"><span class="svg-bg svg-bg--tools-ecu mx-2"></span> <span class="display-mid display-ib">Bench Flashing - For locked vehicles</span></div>
          <div class="grid">
            <div class="mt-3 grid__half--md bg-grey-xlight border-radius p-2">
              <h3 class="h h--3 txt-xbold txt-black">Ktag</h3>
              <p class="mt-0 txt-italic">By Alientech</p>
              <?php
                $tool = 'ktag';
                $dsg_available = '<span class="svg-bg svg-bg--x my-1">No</span>';
                include('components/tool-table-tool.php');
              ?>
            </div>
            <div class="mt-3 grid__half--md bg-grey-xlight border-radius p-2">
              <h3 class="h h--3 txt-xbold txt-black">CMD</h3>
              <p class="mt-0 txt-italic">By Flashtech</p>
              <?php
                $tool = 'cmd_bdm';
                include('components/tool-table-tool.php');
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
  include('components/video.php');
  $media_gallery = rwmb_meta($meta_prefix . 'gallery_2', array('size' => 'thumbnail'));
  include('components/media-gallery.php');
  include('components/trust-us.php');
  include('components/footer.php');
  include('components/foot.php');
