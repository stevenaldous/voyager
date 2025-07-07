<?php //this sheet holds the CPT settings for faqs

// establish taxonomy
function faqs_tax(){
    $tax = '';
    if( get_field('faqs_tax', 'options') == 'def' ) {
      $tax = 'category';
    }
    elseif( get_field('faqs_tax', 'options') == 'cpt' ) {
      $tax = 'faqs_cat';
    }
    return $tax;
  }

// create CPT
add_action( 'init','create_faqs' );

// CPT function
function create_faqs() {
  // vars
  $arch = get_field('faqs_arch', 'option') ? true: false;
  $pub  = get_field('faqs_pub', 'option') ? true: false;
  $slug = get_field('faqs_slug', 'option') ?: 'faqs';
  $tax = faqs_tax();

  register_post_type('faqs',
    array(
      'labels'      => array(
        'name'          => __('FAQs', 'textdomain'),
        'singular_name' => __('FAQ', 'textdomain'),
      ),
      'public'      => $pub,
      'show_in_nav_menus' => true,
      'show_ui'     => true,
      'publicly_queryable' => true,
      'has_archive' => $arch,
      'rewrite' => array('with_front' => false, 'slug' => $slug ),
      'menu_icon' => 'dashicons-editor-help',
      'taxonomies' => array($tax)
    )
  );
  flush_rewrite_rules();
}

/////////////////////////////////////
// CPT Taxonomy /////////////////////
/////////////////////////////////////
if( get_field('faqs_tax', 'options') == 'cpt' ) {

    add_action( 'init', 'faqs_custom_taxonomy', 0);
    // CPT taxonomy function
    function faqs_custom_taxonomy() {
        $tax = faqs_tax();
        $tax_slug = get_field('faqs_tax_slug', 'option') ?: $tax;

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
        register_taxonomy( $tax, 'faqs', $args );
    }
}