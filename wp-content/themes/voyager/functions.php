<?php
/**
 * Voyager functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Voyager
 */

if ( ! defined( 'VOYAGER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'VOYAGER_VERSION', '1.0.0' );
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function voyager_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'voyager' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'voyager' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'voyager_widgets_init' );


/**
 * Voyager Required Resources
 */
$voyager_includes = array(
	/////////////////////////////////////////////////////////////
	// Underscores Resources 
	/////////////////////////////////////////////////////////////

	'/custom-header.php',          	// Implement the Custom Header feature.

	'/template-tags.php',           // Custom template tags for this theme.


	/////////////////////////////////////////////////////////////
	// Voyager Resources 
	/////////////////////////////////////////////////////////////
	
    // '/widgets.php',              // currently, all widgets are disabled in this file.

    '/customizer.php',           // Manage the available customizer fields

    '/enqueue.php',              // Load Scripts and Styles

	// '/blocks.php',            // Gutenberg Blocks

    '/acf.php',                  // ACF functions

    // '/grav-forms.php',           // Gravity Form functions

    '/voyager-functions.php',    // Voyager specific functions

    '/voyager-class-wp-bootstrap-navwalker.php', // Bootstrap nav-walker

    '/setup.php',

    '/pagination.php',            // Pagination code for archive templates

    '/color-panel.php',           // Set Color variables from ACF Settings
	
    
);

foreach ( $voyager_includes as $file ) {
    $filepath = locate_template( '/inc' . $file );
    if ( ! $filepath ) {
        trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
    }
    require_once $filepath;
}




/**
 * Load Jetpack compatibility file if applicable.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// add_action( 'init', 'register_acf_blocks' );

// function register_acf_blocks() {
//     register_block_type( __DIR__ . '/blocks/tabs' );
// }