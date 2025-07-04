<?php
/**
 * Understrap Child Theme enqueue/deqeue functions
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/theme{$suffix}.css";
	$theme_scripts = "/js/theme{$suffix}.js";

	wp_enqueue_style( 'voyager-styles', get_template_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'voyager-scripts', get_template_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );

	// Slick Slider: https://kenwheeler.github.io/slick/
	wp_enqueue_script( 'slick-scripts', get_template_directory_uri() . '/src/js/slick.min.js', array(), '1.8.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// file for loading google fonts based on entry
	get_template_part('inc/google_fonts');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



// /**
//  * Load the child theme's text domain
//  */
// function add_child_theme_textdomain() {
// 	load_child_theme_textdomain( 'voyager-child', get_template_directory() . '/languages' );
// }
// add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


