<?php //this sheet holds the CPT settings for testimonials
// establish taxonomy
function testimonials_tax(){
    $tax = '';
    if( get_field('testimonials_tax', 'options') == 'def' ) {
      $tax = 'category';
    }
    elseif( get_field('testimonials_tax', 'options') == 'cpt' ) {
      $tax = 'testimonials_cat';
    }
    return $tax;
  }

// create CPT
add_action( 'init','create_testimonials' );


// CPT function
function create_testimonials() {
  //vars
  $arch = get_field('testimonials_arch', 'option') ? true : false;
  $pub  = get_field('testimonials_pub', 'option') ? true : false;
  $slug = get_field('testimonials_slug', 'option') ?: 'testimonials';
  $tax  = testimonials_tax();

  register_post_type('testimonials',
    array(
      'labels'      => array(
        'name'          => __('Testimonials', 'textdomain'),
        'singular_name' => __('Testimonial', 'textdomain'),
      ),
        'public'      => $pub,
        'show_in_nav_menus' => true,
        'show_ui'     => true,
        'publicly_queryable' => true,
        'has_archive' => $arch,
        'rewrite'     => array('with_front' => false, 'slug' => $slug ),
        'menu_icon'   => 'dashicons-thumbs-up',
        'taxonomies'  => array($tax)
    )
  );
  flush_rewrite_rules();
}
add_filter('is_post_type_viewable', function($is_viewable, $post_type) {
    if (isset($post_type->has_single) && $post_type->has_single) {
        return false;
    }
    return $is_viewable;
}, 10, 2 );


/////////////////////////////////////
// CPT Taxonomy /////////////////////
/////////////////////////////////////
if( get_field('testimonials_tax', 'options') == 'cpt' ) {

  add_action( 'init', 'testimonials_custom_taxonomy', 0);
  // CPT taxonomy function
  function testimonials_custom_taxonomy() {
      $tax = testimonials_tax();
      $tax_slug = get_field('testimonials_tax_slug', 'option') ?: $tax;

      $labels = array(
          'name'              => _x( 'Types', 'taxonomy general name' ),
          'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
          'search_items'      => __( 'Search Types' ),
          'all_items'         => __( 'All Types' ),
          'parent_item'       => __( 'Parent Type' ),
          'parent_item_colon' => __( 'Parent Type:' ),
          'edit_item'         => __( 'Edit Type' ),
          'update_item'       => __( 'Update Type' ),
          'add_new_item'      => __( 'Add New Type' ),
          'new_item_name'     => __( 'New Type Name' ),
          'menu_name'         => __( 'Types' ),
      );
      $default_term = array(
        'name' => 'Standard', //(string) Name of default term.
        'slug' => 'standard', //(string) Slug for default term.
      );
      $args = array(
          'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
          'labels'            => $labels,
          'default_term'      => $default_term,
          'show_ui'           => true,
          'show_admin_column' => true,
          'query_var'         => true,
          'rewrite'           => array( 'with_front' => false, 'slug' => $tax_slug ),
      );
      register_taxonomy( $tax, 'testimonials', $args );
  }
}