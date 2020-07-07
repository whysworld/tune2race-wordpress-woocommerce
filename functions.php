<?php

  /**
   * Global helpers
   */
  require_once('functions/helpers.php');

  /**
   * Services
   */
  require_once('functions/services.php');

  /**
   * Car selection set and get
   */
  require_once('functions/car-selection.php');

  /**
   * Dealers and geo-specific features
   */
  require_once('functions/dealers.php');

  /**
   * Tool information
   */
  require_once('functions/tools.php');

  /**
   * Form handling
   */
  require_once('functions/forms.php');

  /**
   * Customise wp content management
   */
  add_theme_support('title-tag');

  show_admin_bar(false);

  function custom_admin_styling() {
    wp_enqueue_style('admin_styles', get_template_directory_uri() . '/dist/assets/css/wp-admin.screen.css');
  }

  add_action('admin_head', 'custom_admin_styling');
  require_once('functions/custom-post-types.php');
  require_once('functions/custom-taxonomies.php');
  require_once('functions/custom-fields.php');
  add_theme_support('post-thumbnails');
  add_image_size('small-thumb', 150, 150, false);
  add_image_size('results-image', 440, 230, true);
  add_image_size('service-list', 640, 335, true);
  add_image_size('banner-sm', 640, 640, false);

  // Remove unnecessary assets
  add_filter('wp_default_scripts', 'change_default_jquery');
  function change_default_jquery($scripts) {
    if (!is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php') {
      $scripts->remove('jquery');
    }
  }
  function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
  }
  add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');

  /**
   * Harden wordpress
   */
  // Disable feeds and api endpoints (for security: author user names, form submissions saved as comments, etc)
  function itsme_disable_feed() {
    wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">home page</a>.'));
  }

  add_action('do_feed', 'itsme_disable_feed', 1);
  add_action('do_feed_rdf', 'itsme_disable_feed', 1);
  add_action('do_feed_rss', 'itsme_disable_feed', 1);
  add_action('do_feed_rss2', 'itsme_disable_feed', 1);
  add_action('do_feed_atom', 'itsme_disable_feed', 1);
  add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
  add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
  add_action('plugins_loaded', function () {
    remove_filter('rest_api_init', 'create_initial_rest_routes');
  });
  add_filter('the_content', 'do_shortcode', 11);

  // remove version from head
  remove_action('wp_head', 'wp_generator');

  // remove version from rss
  add_filter('the_generator', '__return_empty_string');