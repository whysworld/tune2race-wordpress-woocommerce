<style>
  .bg-fixed-img:after {
    background-image: url("<?= get_the_post_thumbnail_url($post, 'banner-sm') ?>");
  }
  @media (min-width: 1024px) {
    .bg-fixed-img:after {
      background-image: url("<?= get_the_post_thumbnail_url($post, 'medium') ?>");
    }
  }
  @media (min-width: 1440px) {
    .bg-fixed-img:after {
      background-image: url("<?= get_the_post_thumbnail_url($post, 'large') ?>");
    }
  }
</style>
