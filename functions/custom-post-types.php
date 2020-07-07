<?php
  /**
   * Custom post types
   */
  function register_post_types() {
    register_post_type('results',
        array(
            'labels' => array(
                'name' => __('Results'),
                'singular_name' => __('Result'),
                'add_new_item' => __('Add new result'),
                'edit_item' => __('Edit result'),
                'new_item' => __('New result'),
                'view_item' => __('View result'),
                'view_items' => __('View results'),
            ),
            'public' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
            'menu_icon' => 'dashicons-chart-bar',
            'has_archive' => true,
            'rewrite' => array('slug' => 'results'),
        )
    );
    register_post_type('services',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service'),
                'add_new_item' => __('Add new service'),
                'edit_item' => __('Edit service'),
                'new_item' => __('New service'),
                'view_item' => __('View service'),
                'view_items' => __('View services'),
            ),
            'public' => true,
            'supports' => ['title', 'thumbnail', 'revisions'],
            'menu_icon' => 'dashicons-clipboard',
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
        )
    );
    register_post_type('tuning_tools',
        array(
            'labels' => array(
                'name' => __('Tuning tools'),
                'singular_name' => __('Tuning tool'),
                'add_new_item' => __('Add new tuning tool'),
                'edit_item' => __('Edit tuning tool'),
                'new_item' => __('New tuning tool'),
                'view_item' => __('View tuning tool'),
                'view_items' => __('View tuning tools'),
            ),
            'public' => true,
            'supports' => ['title', 'thumbnail', 'revisions'],
            'menu_icon' => 'dashicons-chart-area',
            'has_archive' => true,
            'rewrite' => array('slug' => 'tuning-tools'),
        )
    );
    register_post_type('file_services',
        array(
            'labels' => array(
                'name' => __('File services'),
                'singular_name' => __('File service'),
                'add_new_item' => __('Add new file service'),
                'edit_item' => __('Edit file service'),
                'new_item' => __('New file service'),
                'view_item' => __('View file service'),
                'view_items' => __('View file service'),
            ),
            'public' => true,
            'supports' => ['title', 'thumbnail', 'revisions'],
            'menu_icon' => 'dashicons-media-spreadsheet',
            'has_archive' => true,
            'rewrite' => array('slug' => 'file-services'),
        )
    );
    register_post_type('campaigns',
        array(
            'labels' => array(
                'name' => __('Campaigns'),
                'singular_name' => __('Campaign'),
                'add_new_item' => __('Add new campaign'),
                'edit_item' => __('Edit campaign'),
                'new_item' => __('New campaign'),
                'view_item' => __('View campaign'),
                'view_items' => __('View campaigns'),
            ),
            'public' => true,
            'supports' => ['title', 'thumbnail', 'revisions'],
            'menu_icon' => 'dashicons-megaphone',
            'has_archive' => true,
            'rewrite' => array('slug' => 'campaigns'),
        )
    );
    register_post_type('faqs',
        array(
            'labels' => array(
                'name' => __('FAQs'),
                'singular_name' => __('FAQ'),
                'add_new_item' => __('Add new FAQ'),
                'edit_item' => __('Edit FAQ'),
                'new_item' => __('New FAQ'),
                'view_item' => __('View FAQ'),
                'view_items' => __('View FAQs'),
            ),
            'public' => true,
            'supports' => ['title', 'editor', 'revisions'],
            'menu_icon' => 'dashicons-editor-help',
            'has_archive' => true,
            'rewrite' => array('slug' => 'faqs'),
        )
    );
    register_post_type('testimonials',
        array(
            'labels' => array(
                'name' => __('Testimonials'),
                'singular_name' => __('Testimonial'),
                'add_new_item' => __('Add new testimonial'),
                'edit_item' => __('Edit testimonial'),
                'new_item' => __('New testimonial'),
                'view_item' => __('View testimonial'),
                'view_items' => __('View testimonials'),
            ),
            'public' => true,
            'supports' => ['title', 'editor', 'revisions'],
            'menu_icon' => 'dashicons-testimonial',
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonials'),
        )
    );
    register_post_type('dealers',
        array(
            'labels' => array(
                'name' => __('Dealers'),
                'singular_name' => __('Dealer'),
                'add_new_item' => __('Add new dealer'),
                'edit_item' => __('Edit dealer'),
                'new_item' => __('New dealer'),
                'view_item' => __('View dealer'),
                'view_items' => __('View dealers'),
            ),
            'public' => true,
            'supports' => ['title', 'thumbnail', 'revisions'],
            'menu_icon' => 'dashicons-groups',
            'has_archive' => true,
            'rewrite' => array('slug' => 'dealers'),
        )
    );
  }
  add_action('init', 'register_post_types');
