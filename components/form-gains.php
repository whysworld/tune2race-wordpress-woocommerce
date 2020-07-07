<div class="expose">
  <div class="txt-center my-3"><a href="#" data-js="expose-toggle" data-js-expose-target="#js<?=$form_prefix?>Content" class="btn btn--on-dark px-5--md"><span class="txt-xbold">+</span> Find out more</a></div>
  <form id="js<?=$form_prefix?>Content" class="jsFormValidation grid bg-grey-xlight my-3 p-3 p-4--md txt-left txt-norm pointer expose__content gains__form" method="post">
    <a href="#" class="display-ib txt-no-dec txt-white txt-uppercase gains__form-close" data-js="expose-toggle" data-js-expose-target="#js<?=$form_prefix?>Content"><span class="svg-bg svg-bg--x">Close</span></a>
    <div>
      <p class="hidden--md-up mt-0 txt-center">More detailed information can be found on our <br/><a href="<?=$service_link?>"><?=$service_name?> <span class="txt-nowrap">page &rarr;</span></a></p>
      <h2 class="h txt-xbold mb-3 txt-center txt-left--md"><span class="hidden--md-up">Or, c</span><span class="hidden--sm-down">C</span>ontact us about <?=$service_name?></h2>
      <div class="grid">
        <div class="grid__half--md">
          <?php $which_form = $service_name; ?>
          <?php include('form-fields-standard.php'); ?>
          <?php include('form-submit-standard.php'); ?>
          <input type="hidden" name="contact-service" value="<?=$service_name?>">
          <input type="hidden" name="which-form" value="<?=$which_form?>">
          <input type="hidden" name="destination" value="<?=get_site_url()?>/contact-us/sent/">
        </div>
        <div class="hidden--sm-down grid__half--md pl-3 txt-sm">
          <?=rwmb_meta('services_teaser', '', $service_id)?>
          <p>More detailed information can be found on our <a href="<?=$service_link?>"><?=$service_name?> <span class="txt-nowrap">page &rarr;</span></a></p>
        </div>
      </div>
    </div>
  </form>
</div>
