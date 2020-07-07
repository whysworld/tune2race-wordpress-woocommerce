<div class="grid">
  <div class="grid-xsqueeze my-3 my-5--md txt-left txt-norm">
    <div class="grid">
      <form class="jsFormValidation grid__half--md bg-grey-xlight p-3 p-4--md mb-3 mb-0--md" method="post">
        <h2 class="h txt-xbold">Have questions?</h2>
        <p class="txt-sm mt-1">Our skilled mechanics will help with anything you need clarifying.</p>
        <?php $which_form = 'contact-page-form'; ?>
        <?php include('form-fields-standard.php'); ?>
        <div id="jsCarContactForm">
          <div class="loading" data-js="loading">
            <div class="loading__viz"><i></i><i></i><i></i><i></i><i></i></div>
          </div>
        </div>
        <?php include('form-submit-standard.php'); ?>
        <?php if (!is_page('contact-us')) { ?>
          <input type="hidden" name="contact-service" value="<?php the_title(); ?>">
        <?php } ?>
        <input type="hidden" name="which-form" value="<?=$which_form?>">
        <input type="hidden" name="destination" value="<?=get_site_url()?>/contact-us/sent/">
      </form>
      <div class="grid__half--md pl-3--md txt-sm" data-js-expose="select-container">
        <div id="jsContactDealers">
          <div class="loading" data-js="loading">
            <div class="loading__viz"><i></i><i></i><i></i><i></i><i></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
