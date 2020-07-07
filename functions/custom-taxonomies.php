<?php
  /**
   * Custom taxonomies
   */
  function register_taxonomies() {
    register_taxonomy(
        'result_cats',
        'results',
        array(
            'hierarchical' => true,
            'label' => 'Result categories',
            'query_var' => true,
            'public' => true,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'result-categories',
                'with_front' => true
            )
        )
    );
    register_taxonomy(
        'faq_cats',
        'faqs',
        array(
            'hierarchical' => true,
            'label' => 'FAQ categories',
            'query_var' => true,
            'public' => true,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'faq-categories',
                'with_front' => true
            )
        )
    );
    register_taxonomy(
        'testimonial_cats',
        'testimonials',
        array(
            'hierarchical' => true,
            'label' => 'Testimonial categories',
            'query_var' => true,
            'public' => true,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'testimonial-categories',
                'with_front' => true
            )
        )
    );
    register_taxonomy(
        'testimonial_locations',
        'testimonials',
        array(
            'hierarchical' => true,
            'label' => 'Testimonial locations',
            'query_var' => true,
            'public' => true,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'testimonial-locations',
                'with_front' => true
            )
        )
    );
  }

  add_action('init', 'register_taxonomies');