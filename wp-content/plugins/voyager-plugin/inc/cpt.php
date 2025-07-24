<?php //this sheet holds the CPT settings for this portfolio.

$filepath = '/inc/cpts/';
// CPT list for register
$voyager_cpts = array(
  'testimonials',
  'team',
  'services',
  // 'cases',

  // 'faqs',
  // 'awards',
  // 'resources',
);

// array for cpt menu removal
$voyager_rm = array();

// loop through each possible CPT process
foreach ( $voyager_cpts as $cpt ) {

    $show = get_field('gcpt_'.$cpt , 'option');
    if( $show != 1 ) {
      array_push($voyager_rm, $cpt);
    }

    $filepath = VOYAGER_PLUGIN_DIR_PATH . 'inc/cpts/'.$cpt.'.php';

    if ( ! $filepath ) {
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
}

// project specific CPT 
// require_once VOYAGER_PLUGIN_DIR_PATH . 'inc/cpts/practices.php';


// remove from menu based on CPT selection
function voyager_remove_menus( $voyager_rm ) {
  foreach ( $voyager_rm as $cpt ) {
    remove_menu_page( 'edit.php?post_type='.$cpt );    // remove cpt from menu
  }
}

// add_action( 'admin_menu', 'voyager_remove_menus' );
add_action('admin_menu', function() use ( $voyager_rm ) { voyager_remove_menus( $voyager_rm ); });