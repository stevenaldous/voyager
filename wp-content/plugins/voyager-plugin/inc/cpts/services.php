<?php //this sheet holds the CPT settings for services

// establish taxonomy
function services_tax(){
  $tax = '';
  if( get_field('services_tax', 'options') == 'def' ) {
    $tax = 'category';
  }
  elseif( get_field('services_tax', 'options') == 'cpt' ) {
    $tax = 'services_cat';
  }
  return $tax;
}

// CPT function
function create_services() {
  // vars
  $arch = get_field('services_arch', 'option') ? true: false;
  $slug = get_field('services_slug', 'option') ?: 'service-areas';
  $tax = services_tax();

  // register LP Post Type
  register_post_type('services',

    array(
      // cpt labels 
      'labels'      => array(
        'name'          => __('Services', 'textdomain'),
        'singular_name' => __('Service', 'textdomain'),
      ),
      // cpt settings 
      'public'      => true,
      'show_in_nav_menus' => true,
      'show_ui'     => true,
      'publicly_queryable' => true,
      'has_archive' => $arch,
      'hierarchical' => true,
      'supports'     => array( 'title', 'editor', 'page-attributes'),
      'rewrite' => array('with_front' => false, 'slug' => $slug ),
      'menu_icon' => 'dashicons-superhero',
      'taxonomies' => array($tax)
    )
    
  );
  flush_rewrite_rules();
}
add_action( 'init','create_services' );


/////////////////////////////////////
// CPT Taxonomy /////////////////////
/////////////////////////////////////
if( get_field('services_tax', 'options') == 'cpt' ) {
  add_action( 'init', 'services_custom_taxonomy', 0);
  // CPT taxonomy function
  function services_custom_taxonomy() {
    $tax = services_tax();
    $tax_slug = get_field('services_tax_slug', 'option') ?: $tax;

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
    register_taxonomy( $tax, 'services', $args );
  }
}