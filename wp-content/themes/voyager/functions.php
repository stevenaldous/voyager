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
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function voyager_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Voyager, use a find and replace
		* to change 'voyager' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'voyager', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'voyager' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	// add_theme_support(
	// 	'custom-background',
	// 	apply_filters(
	// 		'voyager_custom_background_args',
	// 		array(
	// 			'default-color' => 'ffffff',
	// 			'default-image' => '',
	// 		)
	// 	)
	// );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'voyager_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function voyager_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'voyager_content_width', 640 );
}
add_action( 'after_setup_theme', 'voyager_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function voyager_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'voyager' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'voyager' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'voyager_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function voyager_scripts() {
	wp_enqueue_style( 'voyager-style', get_stylesheet_uri(), array(), VOYAGER_VERSION );
	wp_style_add_data( 'voyager-style', 'rtl', 'replace' );

	wp_enqueue_script( 'voyager-navigation', get_template_directory_uri() . '/js/navigation.js', array(), VOYAGER_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'voyager_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';





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

    // '/setup.php',

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