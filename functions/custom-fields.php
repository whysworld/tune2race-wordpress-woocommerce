<?php
  /**
   * Custom fields
   */
  function results_meta($meta_boxes) {
    $prefix = 'results_';
    $meta_boxes[] = array(
        'id' => 'gains',
        'title' => esc_html__('Gains'),
        'post_types' => array('results'),
        'context' => 'after_editor',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'gain_value_1',
                'type' => 'number',
                'name' => esc_html__('Gain value #1'),
                'min' => '1',
                'step' => 'any',
            ),
            array(
                'id' => $prefix . 'gain_unit_1',
                'type' => 'text',
                'name' => esc_html__('Gain unit #1'),
                'desc' => esc_html__('Specify the unit of measurement, e.g. hp'),
            ),

            array(
                'id' => $prefix . 'gain_value_2',
                'type' => 'number',
                'name' => esc_html__('Gain value #2'),
                'min' => '1',
                'step' => 'any',
            ),
            array(
                'id' => $prefix . 'gain_unit_2',
                'type' => 'text',
                'name' => esc_html__('Gain unit #2'),
                'desc' => esc_html__('Specify the unit of measurement, e.g. nm'),
            ),
            array(
                'id' => $prefix . 'dynosheet-file',
                'type' => 'file_advanced',
                'name' => esc_html__('Upload dyno sheet'),
                'max_file_uploads' => 1,
                'max_status' => true,
            ),
        ),
    );
    return $meta_boxes;
  }

  add_filter('rwmb_meta_boxes', 'results_meta');

  function detail_page_fields($prefix) {
    return array(
        array(
            'type' => 'heading',
            'name' => esc_html__('Summary content'),
        ),
        array(
            'id' => $prefix . 'form_headline',
            'type' => 'text',
            'add_to_wpseo_analysis' => true,
            'name' => esc_html__('Form headline'),
        ),
        array(
            'id' => $prefix . 'summary_headline',
            'type' => 'text',
            'add_to_wpseo_analysis' => true,
            'name' => esc_html__('Summary headline'),
        ),
        array(
            'id' => $prefix . 'summary_copy',
            'type' => 'wysiwyg',
            'add_to_wpseo_analysis' => true,
            'options' => array(
                'media_buttons' => false,
                'teeny' => true,
                'textarea_rows' => 10,
            ),
        ),
        array(
            'type' => 'heading',
            'name' => esc_html__('FAQs'),
        ),
        array(
            'id' => $prefix . 'faq_cats',
            'type' => 'taxonomy_advanced',
            'name' => esc_html__('Select FAQ category'),
            'taxonomy' => 'faq_cats',
            'field_type' => 'select_advanced',
        ),
        array(
            'type' => 'heading',
            'name' => esc_html__('Video section'),
        ),
        array(
            'id' => $prefix . 'video_headline',
            'type' => 'text',
            'add_to_wpseo_analysis' => true,
            'name' => esc_html__('Video headline'),
        ),
        array(
            'id' => $prefix . 'video_subheadline',
            'type' => 'text',
            'add_to_wpseo_analysis' => true,
            'name' => esc_html__('Video sub-headline'),
        ),
        array(
            'id' => $prefix . 'youtube_video',
            'type' => 'text',
            'name' => esc_html__('YouTube video ID'),
            'desc' => esc_html__('Only enter the ID of the video, nothing else'),
        ),
        array(
            'type' => 'heading',
            'name' => esc_html__('More information section'),
        ),
        array(
            'id' => $prefix . 'more_info_headline',
            'type' => 'text',
            'add_to_wpseo_analysis' => true,
            'name' => esc_html__('More information headline'),
        ),
        array(
            'id' => $prefix . 'more_info_copy',
            'name' => esc_html__('More information body copy'),
            'type' => 'wysiwyg',
            'add_to_wpseo_analysis' => true,
            'options' => array(
                'media_buttons' => false,
                'teeny' => true,
                'textarea_rows' => 10,
            ),
        ),
        array(
            'id' => $prefix . 'gallery',
            'type' => 'image_advanced',
            'name' => esc_html__('Media gallery'),
            'max_status' => true,
            'force_delete' => false,
            'image_size' => 'thumbnail',
        ),
        array(
            'type' => 'heading',
            'name' => esc_html__('Results'),
        ),
        array(
            'id' => $prefix . 'result_cats',
            'type' => 'taxonomy_advanced',
            'name' => esc_html__('Select a results category'),
            'taxonomy' => 'result_cats',
            'field_type' => 'select_advanced',
            'desc' => esc_html__('Do not select a category if you want to show all results'),
        ),
        array(
            'type' => 'heading',
            'name' => esc_html__('Testimonial'),
        ),
        array(
            'id' => $prefix . 'testimonial_cats',
            'type' => 'taxonomy_advanced',
            'name' => esc_html__('Select a testimonial category'),
            'taxonomy' => 'testimonial_cats',
            'field_type' => 'select_advanced',
            'desc' => esc_html__('Do not select a category if you want to simply show the latest testimonial'),
        ),
    );
  }

  function services_meta($meta_boxes) {
    global $performance_tuning_id, $eco_tuning_id;
    $prefix = 'services_';
    $meta_boxes[] = array(
        'id' => 'service-only-meta-fields',
        'title' => esc_html__('Service details'),
        'post_types' => array('services', 'tuning_tools', 'file_services'),
        'context' => 'after_editor',
        'autosave' => true,
        'style' => 'seamless',
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__('Teaser copy (list view)'),
            ),
            array(
                'id' => $prefix . 'teaser',
                'type' => 'wysiwyg',
                'add_to_wpseo_analysis' => true,
                'options' => array(
                    'media_buttons' => false,
                    'teeny' => true,
                    'textarea_rows' => 10,
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'service-typical-meta-fields',
        'title' => esc_html__('Service details'),
        'post_types' => array('services'),
        'include' => array(
            'ID' => array($performance_tuning_id, $eco_tuning_id),
        ),
        'context' => 'after_editor',
        'autosave' => true,
        'style' => 'seamless',
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__('Banner section for no car selected'),
            ),
            array(
                'id' => $prefix . 'gain_value_1',
                'type' => 'number',
                'name' => esc_html__('Typical gain value #1'),
                'min' => '1',
                'step' => 'any',
            ),
            array(
                'id' => $prefix . 'gain_unit_1',
                'type' => 'text',
                'name' => esc_html__('Typical gain unit #1'),
                'desc' => esc_html__('Specify the unit of measurement, e.g. hp'),
            ),
            array(
                'id' => $prefix . 'gain_value_2',
                'type' => 'number',
                'name' => esc_html__('Typical gain value #2'),
                'min' => '1',
                'step' => 'any',
            ),
            array(
                'id' => $prefix . 'gain_unit_2',
                'type' => 'text',
                'name' => esc_html__('Typical gain unit #2'),
                'desc' => esc_html__('Specify the unit of measurement, e.g. nm'),
            ),
        ),
    );
    $meta_boxes[] = array(
        'id' => 'service-meta-fields',
        'title' => esc_html__('Service details'),
        'post_types' => array('services', 'tuning_tools', 'file_services'),
        'context' => 'after_editor',
        'autosave' => true,
        'style' => 'seamless',
        'fields' => detail_page_fields($prefix),
    );
    $meta_boxes[] = array(
        'id' => 'dpf-meta-fields',
        'title' => esc_html__('DPF only details'),
        'post_types' => array('services'),
        'context' => 'after_editor',
        'autosave' => true,
        'style' => 'seamless',
        'include' => array(
            'ID' => array(96),
        ),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__('How section'),
            ),
            array(
                'id' => $prefix . 'how_headline',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How headline'),
            ),
            array(
                'id' => $prefix . 'how_headline_1',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How headline #1'),
            ),
            array(
                'id' => $prefix . 'how_copy_1',
                'type' => 'textarea',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How copy #1'),
            ),
            array(
                'id' => $prefix . 'how_image_1',
                'type' => 'image_advanced',
                'name' => esc_html__('How image #1'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'id' => $prefix . 'how_headline_2',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How headline #2'),
            ),
            array(
                'id' => $prefix . 'how_copy_2',
                'type' => 'textarea',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How copy #2'),
            ),
            array(
                'id' => $prefix . 'how_image_2',
                'type' => 'image_advanced',
                'name' => esc_html__('How image #2'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'id' => $prefix . 'how_headline_3',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How headline #3'),
            ),
            array(
                'id' => $prefix . 'how_copy_3',
                'type' => 'textarea',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How copy #3'),
            ),
            array(
                'id' => $prefix . 'how_image_3',
                'type' => 'image_advanced',
                'name' => esc_html__('How image #3'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
        ),
    );
    return $meta_boxes;
  }

  add_filter('rwmb_meta_boxes', 'services_meta');

  function campaign_meta($meta_boxes) {
    $prefix = 'campaigns_';
    $meta_boxes[] = array(
        'id' => 'campaign-meta-fields',
        'title' => esc_html__('Campaign details'),
        'post_types' => array('campaigns'),
        'context' => 'after_editor',
        'autosave' => true,
        'style' => 'seamless',
        'fields' => detail_page_fields($prefix),
    );
    return $meta_boxes;
  }

  add_filter('rwmb_meta_boxes', 'campaign_meta');

  function become_a_dealer_meta($meta_boxes) {
    $prefix = 'become_a_dealer_';
    $meta_boxes[] = array(
        'id' => 'become-a-dealer-meta-fields',
        'title' => esc_html__('Become a dealer details'),
        'autosave' => true,
        'style' => 'seamless',
        'post_types' => array('page'),
        'context' => 'after_editor',
        'include' => array(
            'template' => array('page-become-a-dealer.php'),
        ),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__('Summary content'),
            ),
            array(
                'id' => $prefix . 'form_headline',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('Form headline'),
            ),
            array(
                'id' => $prefix . 'summary_headline',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('Summary headline'),
            ),
            array(
                'id' => $prefix . 'summary_copy',
                'type' => 'wysiwyg',
                'add_to_wpseo_analysis' => true,
                'options' => array(
                    'media_buttons' => false,
                    'teeny' => true,
                    'textarea_rows' => 10,
                ),
            ),
            array(
                'type' => 'heading',
                'name' => esc_html__('FAQs'),
            ),
            array(
                'id' => $prefix . 'faq_cats',
                'type' => 'taxonomy_advanced',
                'name' => esc_html__('Select FAQ category'),
                'taxonomy' => 'faq_cats',
                'field_type' => 'select_advanced',
            ),
            array(
                'type' => 'heading',
                'name' => esc_html__('More information section'),
            ),
            array(
                'id' => $prefix . 'more_info_headline',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('More information headline'),
            ),
            array(
                'id' => $prefix . 'more_info_copy',
                'name' => esc_html__('More information body copy'),
                'type' => 'wysiwyg',
                'add_to_wpseo_analysis' => true,
                'options' => array(
                    'media_buttons' => false,
                    'teeny' => true,
                    'textarea_rows' => 10,
                ),
            ),
            array(
                'id' => $prefix . 'gallery',
                'type' => 'image_advanced',
                'name' => esc_html__('Media gallery'),
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'type' => 'heading',
                'name' => esc_html__('Video section'),
            ),
            array(
                'id' => $prefix . 'video_headline',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('Video headline'),
            ),
            array(
                'id' => $prefix . 'video_subheadline',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('Video sub-headline'),
            ),
            array(
                'id' => $prefix . 'youtube_video',
                'type' => 'text',
                'name' => esc_html__('YouTube video ID'),
                'desc' => esc_html__('Only enter the ID of the video, nothing else'),
            ),
            array(
                'type' => 'heading',
                'name' => esc_html__('How section'),
            ),
            array(
                'id' => $prefix . 'how_headline',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How headline'),
            ),
            array(
                'id' => $prefix . 'how_headline_1',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How headline #1'),
            ),
            array(
                'id' => $prefix . 'how_copy_1',
                'type' => 'textarea',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How copy #1'),
            ),
            array(
                'id' => $prefix . 'how_image_1',
                'type' => 'image_advanced',
                'name' => esc_html__('How image #1'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'id' => $prefix . 'how_headline_2',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How headline #2'),
            ),
            array(
                'id' => $prefix . 'how_copy_2',
                'type' => 'textarea',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How copy #2'),
            ),
            array(
                'id' => $prefix . 'how_image_2',
                'type' => 'image_advanced',
                'name' => esc_html__('How image #2'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'id' => $prefix . 'how_headline_3',
                'type' => 'text',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How headline #3'),
            ),
            array(
                'id' => $prefix . 'how_copy_3',
                'type' => 'textarea',
                'add_to_wpseo_analysis' => true,
                'name' => esc_html__('How copy #3'),
            ),
            array(
                'id' => $prefix . 'how_image_3',
                'type' => 'image_advanced',
                'name' => esc_html__('How image #3'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'type' => 'heading',
                'name' => esc_html__('Tools'),
            ),
            array(
                'id' => $prefix . 'kess_image',
                'type' => 'image_advanced',
                'name' => esc_html__('Kess image'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'id' => $prefix . 'kess_video',
                'type' => 'text',
                'name' => esc_html__('Kess video ID'),
                'desc' => esc_html__('Enter the youtube id only'),
            ),
            array(
                'id' => $prefix . 'kess_list',
                'type' => 'file_advanced',
                'name' => esc_html__('Kess vehicle list'),
                'max_file_uploads' => 1,
                'max_status' => true,
            ),
            array(
                'id' => $prefix . 'cmd_image',
                'type' => 'image_advanced',
                'name' => esc_html__('CMD image'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'id' => $prefix . 'cmd_video',
                'type' => 'text',
                'name' => esc_html__('CMD video ID'),
                'desc' => esc_html__('Enter the youtube id only'),
            ),
            array(
                'id' => $prefix . 'cmd_list',
                'type' => 'file_advanced',
                'name' => esc_html__('CMD vehicle list'),
                'max_file_uploads' => 1,
                'max_status' => true,
            ),
            array(
                'id' => $prefix . 'ktag_image',
                'type' => 'image_advanced',
                'name' => esc_html__('Ktag image'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'id' => $prefix . 'ktag_video',
                'type' => 'text',
                'name' => esc_html__('Ktag video ID'),
                'desc' => esc_html__('Enter the youtube id only'),
            ),
            array(
                'id' => $prefix . 'ktag_list',
                'type' => 'file_advanced',
                'name' => esc_html__('Ktag vehicle list'),
                'max_file_uploads' => 1,
                'max_status' => true,
            ),
            array(
                'id' => $prefix . 'cmd_bdm_image',
                'type' => 'image_advanced',
                'name' => esc_html__('CMD BDM image'),
                'max_file_uploads' => 1,
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
            array(
                'id' => $prefix . 'cmd_bdm_video',
                'type' => 'text',
                'name' => esc_html__('CMD BDM video ID'),
                'desc' => esc_html__('Enter the youtube id only'),
            ),
            array(
                'id' => $prefix . 'cmd_bdm_list',
                'type' => 'file_advanced',
                'name' => esc_html__('CDM BDM vehicle list'),
                'max_file_uploads' => 1,
                'max_status' => true,
            ),
            array(
                'id' => $prefix . 'gallery_2',
                'type' => 'image_advanced',
                'name' => esc_html__('Second Media gallery'),
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
        ),
    );
    return $meta_boxes;
  }

  add_filter('rwmb_meta_boxes', 'become_a_dealer_meta');

  function hide_editor() {
    global $post;
    if ('page-become-a-dealer.php' == get_post_meta($post->ID, '_wp_page_template', true)) {
      remove_post_type_support('page', 'editor');
    }
  }

  add_action('add_meta_boxes_page', 'hide_editor');

  function powergate_meta($meta_boxes) {
    $prefix = 'powergate_';
    $meta_boxes[] = array(
        'id' => 'powergate-meta-fields',
        'title' => esc_html__('Powergate details'),
        'autosave' => true,
        'style' => 'seamless',
        'context' => 'after_editor',
        'post_types' => array('page'),
        'include' => array(
            'template' => array('page-powergate.php'),
        ),
        'fields' => array(
            array(
                'type' => 'heading',
                'name' => esc_html__('Summary content'),
            ),
            array(
                'id' => $prefix . 'form_headline',
                'type' => 'text',
                'name' => esc_html__('Form headline'),
            ),
            array(
                'id' => $prefix . 'summary_headline',
                'type' => 'text',
                'name' => esc_html__('Summary headline'),
            ),
            array(
                'id' => $prefix . 'summary_copy',
                'type' => 'wysiwyg',
                'add_to_wpseo_analysis' => true,
                'options' => array(
                    'media_buttons' => false,
                    'teeny' => true,
                    'textarea_rows' => 10,
                ),
            ),
            array(
                'type' => 'heading',
                'name' => esc_html__('FAQs'),
            ),
            array(
                'id' => $prefix . 'faq_cats',
                'type' => 'taxonomy_advanced',
                'name' => esc_html__('Select FAQ category'),
                'taxonomy' => 'faq_cats',
                'field_type' => 'select_advanced',
            ),
            array(
                'type' => 'heading',
                'name' => esc_html__('Video section'),
            ),
            array(
                'id' => $prefix . 'video_headline',
                'type' => 'text',
                'name' => esc_html__('Video headline'),
            ),
            array(
                'id' => $prefix . 'video_subheadline',
                'type' => 'text',
                'name' => esc_html__('Video sub-headline'),
            ),
            array(
                'id' => $prefix . 'youtube_video',
                'type' => 'text',
                'name' => esc_html__('YouTube video ID'),
                'desc' => esc_html__('Only enter the ID of the video, nothing else'),
            ),
            array(
                'id' => $prefix . 'gallery',
                'type' => 'image_advanced',
                'name' => esc_html__('Media gallery'),
                'max_status' => true,
                'force_delete' => false,
                'image_size' => 'thumbnail',
            ),
        ),
    );
    return $meta_boxes;
  }

  add_filter('rwmb_meta_boxes', 'powergate_meta');

  function dealers_meta($meta_boxes) {
    $prefix = 'dealers_';
    $cities = array();
    foreach (get_city_db_rows() as $city_row) {
      $cities[$city_row->id] = $city_row->name;
    }
    $meta_boxes[] = array(
        'id' => 'dealer-meta-fields',
        'title' => esc_html__('Dealer details'),
        'autosave' => true,
        'style' => 'seamless',
        'context' => 'after_editor',
        'post_types' => array('dealers'),
        'fields' => array(
            array(
                'name' => 'City',
                'id' => $prefix . 'city',
                'type' => 'select',
                'options' => $cities,
                'placeholder' => 'Select a city',
                'multiple' => false,
            ),
            array(
                'id' => $prefix . 'type',
                'type' => 'text',
                'name' => esc_html__('Workshop type'),
            ),
            array(
                'id' => $prefix . 'phone',
                'type' => 'tel',
                'name' => esc_html__('Phone number'),
            ),
            array(
                'id' => $prefix . 'email',
                'type' => 'email',
                'name' => esc_html__('Email address'),
            ),
            array(
                'id' => $prefix . 'map',
                'type' => 'text',
                'name' => esc_html__('Map ID'),
            ),
        ),
    );
    return $meta_boxes;
  }

  add_filter('rwmb_meta_boxes', 'dealers_meta');


  // Add city column to dealers list
  function set_custom_edit_dealers_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
      if ($key == 'date') {
        // Add the city column before the date
        $new_columns['city'] = __('City');
      }
      $new_columns[$key] = $value;
    }
    return $new_columns;
  }

  add_filter('manage_dealers_posts_columns', 'set_custom_edit_dealers_columns');

  function custom_dealers_column($column, $post_id) {
    global $wpdb;
    switch ($column) {
      case 'city' :
        $id = get_post_meta($post_id, 'dealers_city', true);
        $db_row = $wpdb->get_results("SELECT * FROM `tr_cities` WHERE `id` = $id");
        $city_name = $db_row[0]->name;
        echo $city_name;
        break;
    }
  }

  add_action('manage_dealers_posts_custom_column', 'custom_dealers_column', 10, 2);

  function media_meta($meta_boxes) {
    $prefix = 'media_';
    $meta_boxes[] = array(
        'id' => 'media-meta-fields',
        'title' => esc_html__('Custom media fields'),
        'autosave' => true,
        'style' => 'seamless',
        'context' => 'after_editor',
        'post_types' => array('attachment'),
        'media_modal' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'video_id',
                'type' => 'text',
                'name' => esc_html__('Video ID'),
            )
        ),
    );
    return $meta_boxes;
  }

  add_filter('rwmb_meta_boxes', 'media_meta');


