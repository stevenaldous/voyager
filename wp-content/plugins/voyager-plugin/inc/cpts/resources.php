<?php //this sheet holds the CPT settings for resources

// establish taxonomy
function resources_tax(){
    $tax = '';
    if( get_field('resources_tax', 'options') == 'def' ) {
      $tax = 'category';
    }
    elseif( get_field('resources_tax', 'options') == 'cpt' ) {
      $tax = 'resources_cat';
    }
    return $tax;
  }

// create CPT
function create_resources() {
    // vars
    $arch = get_field('resources_arch', 'option') ? true: false;
    $slug = get_field('resources_slug', 'option') ?: 'resources';
    $tax  = resources_tax();
    
    register_post_type('resources',
    array(
      'labels'      => array(
        'name'          => __('Resources', 'textdomain'),
        'singular_name' => __('Resource', 'textdomain'),
      ),
      'public'      => true,
      'show_in_nav_menus' => true,
      'show_ui'     => true,
      'publicly_queryable' => true,
      'has_archive' => $arch,
      'rewrite'     => array('with_front' => false, 'slug' => $slug ),
      'menu_icon'   => 'dashicons-hammer',
      'taxonomies'  => array($tax),
    )
  );
  flush_rewrite_rules();
}
add_action( 'init','create_resources' );
/////////////////////////////////////
// CPT Taxonomy /////////////////////
/////////////////////////////////////
if( get_field('resources_tax', 'options') == 'cpt' ) {

    add_action( 'init', 'resources_custom_taxonomy', 0);
    // CPT taxonomy function
    function resources_custom_taxonomy() {
        $tax = resources_tax();
        $tax_slug = get_field('resources_tax_slug', 'option') ?: $tax;

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
        register_taxonomy( $tax, 'resources', $args );
    }
}