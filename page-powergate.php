<?php
  /**
   * Template Name: Powergate
   */
?>
<?php
  include('components/header.php');
  include('components/banner-bg-image.php');
  include('components/banner.php');
  $meta_prefix = "powergate_";
?>
  <div id="jsPowerGateWall"></div>
  <div class="bg-texture bg-texture--grey txt-center py-4">
    <div class="grid-squeeze">
      <span class="display-mid display-ib"><img src="<?=get_template_directory_uri()?>/dist/assets/images/content/powergate.png" alt="PowerGate"></span>
      <span class="display-mid display-ib txt-xbold h--1 mx-3">+</span>
      <span class="svg-bg svg-bg--logo header__logo">Tune2Race</span>
    </div>
  </div>
  <div class="grid-squeeze">
    <div class="grid__half--lg is-centered txt-center txt-bold mt-3 mt-5--md">
      <?php the_content(); ?>
    </div>
  </div>
  <?php include('components/media-gallery.php'); ?>
  <div class="grid-xsqueeze my-3 txt-left txt-norm">
    <div class="grid">
      <div class="grid__half--md bg-grey-xlight p-3 p-4--md mb-3 mb-0--md">
        <form class="jsFormValidation" method="post">
          <h2 class="h txt-xbold mb-3"><?=rwmb_meta($meta_prefix . 'form_headline');?></h2>
          <?php $which_form = 'Powergate'; ?>
          <?php include('components/form-fields-standard.php'); ?>
          <label for="powergate-option" class="label">What are you interested in?</label>
          <select id="powergate-option" name="powergate-option" class="select--enhanced-sm select--enhanced-muted" data-js="enhance-select">
            <option>Just the device</option>
            <option>The device and 2 files</option>
          </select>
          <div class="txt-sm mb-3">
            Once we've confirmed your details with you, we'll send you a secure PayPal link that <a href="https://www.paypal.com/us/webapps/mpp/paypal-safety-and-security">protects your purchase and ensures delivery</a>. 100% money back guaranteed.
          </div>
          <button class="btn btn--primary btn--block">Enquire now</button>
          <div class="grid txt-nowrap txt-center mt-4 line-through line-through--on-dark">
            <span class="display-ib bg-grey-xlight px-2">
              <span class="svg-bg svg-bg--ssl mr-2">SSL Secure</span>
              <span class="svg-bg svg-bg--money-back-dark mr-2">Money back guarantee</span>
              <span class="svg-bg svg-bg--paypal">PayPal Secured</span>
            </span>
          </div>
          <input type="hidden" name="contact-service" value="<?=$which_form?>">
          <input type="hidden" name="which-form" value="<?=$which_form?>">
          <input type="hidden" name="destination" value="<?=get_site_url()?>/contact-us/sent/">
          <input type="hidden" name="t2r-action" value="submit_contact_form">
        </form>
      </div>
      <div class="grid__half--md pl-3--md txt-sm">
        <h2 class="h h--3 txt-xbold my-3 mt-5--md"><?=rwmb_meta($meta_prefix . 'summary_headline');?></h2>
        <?=rwmb_meta($meta_prefix . 'summary_copy')?>
        <?php
          $faqs_args = array(
              'post_type' => 'faqs',
              'tax_query' => array(
                  array(
                      'taxonomy' => 'faq_cats',
                      'terms' => rwmb_meta($meta_prefix . 'faq_cats')->term_id,
                  )
              )
          );
          $faqs = new WP_Query($faqs_args);
          if ($faqs->have_posts()) : ?>
            <h2 class="h txt-xbold mt-4">FAQs</h2>
            <ul class="ul ul--silent">
              <?php while ($faqs->have_posts()) : $faqs->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" data-js="modal-toggle" data-js-modal="#jsFaqsModal" data-js-modal-html="<?php the_permalink(); ?> #jsModalContent"><?php the_title(); ?></a></li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
  <div id="jsFaqsModal" class="bg-xxdark-overlay modal" data-js="modal">
    <a href="#" class="modal__close" data-js="modal-close" data-js-modal="#jsFaqsModal"><span class="svg-bg svg-bg--x">close</span></a>
    <div class="modal__screen">
      <div class="modal__content" data-js="modal-content">
        <div class="bg-white p-3 grid-xsqueeze" data-js="modal-html"></div>
      </div>
    </div>
  </div>
<?php
  include('components/video.php');
  include('components/trust-us.php');
  include('components/footer.php');
  include('components/foot.php');
