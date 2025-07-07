<?php //this sheet holds the CPT settings for Team

// establish taxonomy
function team_tax(){
  $tax = '';
  if( get_field('team_tax', 'options') == 'def' ) {
    $tax = 'category';
  }
  elseif( get_field('team_tax', 'options') == 'cpt' ) {
    $tax = 'team_cat';
  }
  return $tax;
}

// create CPT
function team_cpt () {
  // vars
  $arch = get_field('team_arch', 'option') ? true: false;
  $slug = get_field('team_slug', 'option') ?: 'our-team';
  $tax  = team_tax();

  register_post_type('team',
  
    array(
      'labels'      => array(
        'name'          => __('Team Members', 'textdomain'),
        'singular_name' => __('Team Member', 'textdomain'),
      ),
      'public'      => true,
      'show_in_nav_menus' => true,
      'show_ui'     => true,
      'publicly_queryable' => true,
      'has_archive' => $arch,
      'rewrite' => array('with_front' => false, 'slug' => $slug ),
      'menu_icon' => 'dashicons-groups',
      'taxonomies' => array($tax)
    )
  );
  flush_rewrite_rules();
}

add_action('init', 'team_cpt');

////////////////////////////////////
// CPT Taxonomy /////////////////////
/////////////////////////////////////
if( get_field('team_tax', 'options') == 'cpt' ) {
  add_action( 'init', 'team_custom_taxonomy', 0);
  // CPT taxonomy function
  function team_custom_taxonomy() {
    $tax = team_tax();
    $tax_slug = get_field('team_tax_slug', 'option') ?: $tax;

    $labels = array(
        'name'              => _x( 'Team Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Team Category', 'taxonomy singular name' ),
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
    register_taxonomy( $tax , 'team', $args );
  }
}
?>