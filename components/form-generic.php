<?php
  global $post;
  $which_form = $post->post_name;
?>
<div class="grid-xsqueeze my-3 my-5--md txt-left txt-norm sticky-mobile-cta jsStickyMobileCta">
  <!-- Don't show the form for the ecu files service -->
  <?php if (!is_single($ecu_files_id)) { ?>
    <div class="bg-grey-xlight p-2 txt-center sticky-mobile-cta__action sticky-mobile-cta__action--md">
      <a href="#contact" class="btn btn--block btn--primary jsStickyMobileCtaToggle">
        <span class="txt-lg">Contact us</span>
      </a>
    </div>
  <!-- end ecu files service conditional -->
  <?php } ?>
  <div class="grid">
    <!-- Don't show the form for the ecu files service -->
    <?php if (!is_single($ecu_files_id)) { ?>
      <div class="sticky-mobile-cta__form--md grid__half--md bg-grey-xlight p-3 p-4--md mb-3 mb-0--md">
        <a href="#" class="sticky-mobile-cta__form-close sticky-mobile-cta__form-close--md jsStickyMobileCtaToggle"><span class="svg-bg svg-bg--x">close</span></a>
        <form id="contact" class="jsFormValidation" method="post">
          <h2 class="h txt-xbold mb-3 sticky-mobile-cta__form-headline"><?=rwmb_meta($meta_prefix . 'form_headline');?></h2>
          <?php include('form-fields-standard.php'); ?>
          <div id="jsCarGenericForm">
            <div class="loading" data-js="loading">
              <div class="loading__viz"><i></i><i></i><i></i><i></i><i></i></div>
            </div>
          </div>
          <?php include('form-submit-standard.php'); ?>
          <input type="hidden" name="contact-service" value="<?php the_title(); ?>">
          <input type="hidden" name="which-form" value="<?=$which_form?>">
          <input type="hidden" name="destination" value="<?=get_site_url()?>/contact-us/sent/">
        </form>
      </div>
      <div class="grid__half--md pl-3--md txt-sm">
    <!-- end ecu files service conditional -->
    <?php } ?>
      <h2 class="h txt-xbold"><?=rwmb_meta($meta_prefix . 'summary_headline')?></h2>
      <?=rwmb_meta($meta_prefix . 'summary_copy')?>
      <?php
        $faq_cat = rwmb_meta($meta_prefix . 'faq_cats');
        if (isset($faq_cat->term_id)) {
          $faqs_args = array(
              'post_type' => 'faqs',
              'tax_query' => array(
                  array(
                      'taxonomy' => 'faq_cats',
                      'terms' => $faq_cat->term_id,
                  )
              )
          );
          $faqs = new WP_Query($faqs_args);
          if ($faqs->have_posts()) : ?>
            <h2 class="h txt-xbold mt-4">FAQs</h2>
            <ul class="ul ul--silent mb-0">
              <?php while ($faqs->have_posts()) : $faqs->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" data-js="modal-toggle" data-js-modal="#jsFaqsModal" data-js-modal-html="<?php the_permalink(); ?> #jsModalContent"><?php the_title(); ?></a></li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
          <?php wp_reset_postdata();
        } ?>
    <!-- Don't show the form for the ecu files service, show link instead -->
    <?php if (!is_single($ecu_files_id)) { ?>
      </div>
    <?php } else { ?>
      <div class="txt-center">
        <a href="https://desk.zoho.com/portal/tuned2race/signup" class="btn btn--primary btn--lg">Sign up now</a>
      </div>
    <?php } ?>

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