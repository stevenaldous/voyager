<?php //this sheet holds the CPT settings for Videos

// establish taxonomy
function vids_tax(){
    $tax = '';
    if( get_field('vids_tax', 'options') == 'def' ) {
      $tax = 'category';
    }
    elseif( get_field('vids_tax', 'options') == 'cpt' ) {
      $tax = 'vids_cat';
    }
    return $tax;
  }

// create CPT
add_action( 'init','create_vids' );

// CPT function
function create_vids() {
  // vars
  $arch = get_field('videos_arch', 'option') ? true: false;
  $pub  = get_field('videos_pub', 'option') ? true: false;
  $slug = get_field('vids_slug', 'option') ?: 'video-library';
  $tax  = vids_tax();

  register_post_type('videos',
    array(
      'labels'      => array(
        'name'          => __('Video Library', 'textdomain'),
        'singular_name' => __('Video', 'textdomain'),
      ),
      'public'      => $pub,
      'show_in_nav_menus' => true,
      'show_ui'     => true,
      'publicly_queryable' => true,
      'has_archive' => $arch,
      'rewrite'     => array('with_front' => false, 'slug' => $slug ),
      'menu_icon'   => 'dashicons-format-video',
      'taxonomies'  => array($tax),
    )
  );
  flush_rewrite_rules();
}

/////////////////////////////////////
// CPT Taxonomy /////////////////////
/////////////////////////////////////
if( get_field('vids_tax', 'options') == 'cpt' ) {

    add_action( 'init', 'vids_custom_taxonomy', 0);
    // CPT taxonomy function
    function vids_custom_taxonomy() {
        $tax = vids_tax();
        $tax_slug = get_field('vids_tax_slug', 'option') ?: $tax;

        $labels = array(
            'name'              => _x( 'Categories', 'taxonomy general name' ),
            'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Categories' ),
            'all_items'         => __( 'All Categories' ),
            'parent_item'       => __( 'Parent Category' ),
            'parent_item_colon' => __( 'Parent Category:' ),
            'edit_item'         => __( 'Edit Category' ),
            'update_item'       => __( 'Update Category' ),
            'add_new_item'      => __( 'Add New Category' ),
            'new_item_name'     => __( 'New Category Name' ),
            'menu_name'         => __( 'Categories' ),
        );
        $args = array(
            'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'with_front' => false, 'slug' => $tax_slug ),
        );
        register_taxonomy( $tax, 'vids', $args );
    }
}