<?php include ('head.php'); ?>
<header class="bg-grey-xdark txt-sm txt-white txt-bold txt-nowrap py-3 header">
  <div class="grid-fluid">
    <nav class="grid__half grid__2-3rds--md grid__1-3rd--lg header__nav-left">
      <a href="<?=get_site_url()?>" class="link--silent svg-bg svg-bg--logo header__logo mt-1 mt-0--md mb-1--md">Tune2Race</a>
      <span class="display-ib hidden--sm-down">
        <a href="/services/" class="display-ib txt-white txt-no-dec mt-1 mx-3">Our services</a>
        <a href="/contact-us/" class="display-ib txt-white txt-no-dec">Contact us</a>
      </span>
    </nav>
    <nav class="grid__half grid__1-3rd--md grid__2-3rds--lg txt-right">
      <div id="jsExposeMenus" class="expose__content expose__content--lg-down expose__content--above header__menus" data-js="expose-content">
        <a href="#" class="display-ib txt-no-dec txt-white txt-uppercase header__menus-close" data-js="expose-toggle" data-js-expose="full-nav" data-js-expose-target="#jsExposeMenus"><span class="display-ib display-mid">close</span> <span class="svg-bg svg-bg--x"></span></a>
        <div class="header__menus-cont">
          <div class="hidden--md-up">
            <a href="/services/" class="btn btn--on-dark-alt btn--block mb-2 header__btns">Our services</a>
            <a href="/contact-us/" class="btn btn--on-dark-alt btn--block mb-2 header__btns">Contact us</a>
          </div>
          <div id="jsCountryHeader" class="display-ib display-mid header__btns"></div>
          <div id="weglot_here"></div>
          <div id="jsCarHeader" class="display-ib display-mid header__btns"></div>
          <a href="/become-a-dealer" class="btn btn--on-dark header__btns">Own a workshop?</a>
          <div class="grid txt-nowrap txt-center mt-4 mb-3 line-through line-through--on-dark header__trust">
            <span class="display-ib bg-grey-xdark px-3"><span class="svg-bg svg-bg--ssl mr-2">SSL Secure</span> <span class="svg-bg svg-bg--money-back">Money back guarantee</span></span>
          </div>
        </div>
      </div>
      <a href="#" class="btn btn--on-dark-alt hidden--sm-down hidden--lg-up" data-js="expose-toggle" data-js-expose-target="#jsExposeMenus"><span class="svg-bg svg-bg--flag-uk mr-1"></span><span class="svg-bg svg-bg--car-white mr-1"></span> <span class="display-ib display-mid">Edit your details</span></a>
      <a href="#" class="btn btn--on-dark-alt hidden--md-up" data-js="expose-toggle" data-js-expose="full-nav" data-js-expose-target="#jsExposeMenus"><span class="svg-bg svg-bg--nav mr-1"></span> <span class="display-ib display-mid">Menu</span></a>
    </nav>
  </div>
</header>
<div class="anchor-footer__chain">