<?php
  $video_id = rwmb_meta($meta_prefix . 'youtube_video');
  if (isset($video_id) && $video_id != "") : ?>
<div class="grid txt-center my-3 my-5--lg">
  <h3 class="h h--1"><?=rwmb_meta($meta_prefix . 'video_headline')?></h3>
  <p class="mt-0 txt-sm grid-xsqueeze"><?=rwmb_meta($meta_prefix . 'video_subheadline')?></p>
  <div class="video-embed">
    <iframe class="video-embed__iframe" src="https://www.youtube.com/embed/<?=$video_id?>?rel=0&amp;showinfo=0&amp;wmode=transparent&amp;disablekb=1" frameborder="0" scrolling="no-scrolling"></iframe>
  </div>
</div>
<?php endif; ?>