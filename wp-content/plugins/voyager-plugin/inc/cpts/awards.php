<?php //this sheet holds the CPT settings for Awards

function awards_cpt () {
  register_post_type('awards',
    array(
      'labels'      => array(
        'name'          => __('Awards', 'textdomain'),
        'singular_name' => __('Award', 'textdomain'),
      ),
        'public'      => false,
        'has_archive' => false,
        'show_in_nav_menus' => false,
        'show_ui'     => true,
        'rewrite'     => array('with_front' => false, 'slug' => 'awards' ),
        'menu_icon'   => 'dashicons-awards',
    )
  );
  flush_rewrite_rules();
}

add_action('init', 'awards_cpt');