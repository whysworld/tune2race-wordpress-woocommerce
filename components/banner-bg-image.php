<style>
  .banner {
    background-image: url("<?= get_the_post_thumbnail_url($post, 'banner-sm') ?>");
  }
  @media (min-width: 1024px) {
    .banner {
      background-image: url("<?= get_the_post_thumbnail_url($post, 'medium') ?>");
    }
  }
  @media (min-width: 1440px) {
    .banner {
      background-image: url("<?= get_the_post_thumbnail_url($post, 'large') ?>");
    }
  }
</style>