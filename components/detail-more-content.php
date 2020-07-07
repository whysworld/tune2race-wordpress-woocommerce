<?php
  $more_info_headline = rwmb_meta($meta_prefix . 'more_info_headline');
  $more_info_copy = rwmb_meta($meta_prefix . 'more_info_copy');
  if ((isset($more_info_headline) && $more_info_headline != "") || (isset($more_info_copy) && $more_info_copy != "")) : ?>
    <div class="grid-xsqueeze my-3 my-4--md px-4--xl">
      <h3 class="h h--1 txt-xbold txt-center"><?=$more_info_headline?></h3>
      <?=$more_info_copy?>
    </div>
<?php endif; ?>