<?php
/**
 * Voyager Theme Customizer
 *
 * @package Voyager
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function voyager_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'voyager_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'voyager_customize_partial_blogdescription',
			)
		);
	}





    // remove some default WP sections
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('background_image');
	$wp_customize->remove_section('header_image');

	

    // remove understrap settings
    $wp_customize->remove_control('understrap_site_info_override');
    // $wp_customize->remove_control('understrap_container_type');

    // $wp_customize->remove_control('understrap_navbar_type');
    // $wp_customize->remove_control('understrap_sidebar_position');


	$wp_customize->add_setting( 'light_logo', array(
        'default' => get_theme_file_uri('images/logos/logo.png'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'light_logo_control', array(
        'label' => 'Light Logo',
        'priority' => 20,
        'section' => 'title_tagline',
        'settings' => 'light_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));


	$wp_customize->add_setting( 'mobile_logo', array(
        'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mobile_logo_control', array(
        'label' => 'Mobile Logo',
        'priority' => 20,
        'section' => 'title_tagline',
        'settings' => 'mobile_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));





	// footer logo 
	$wp_customize->add_setting( 'footer_logo', array(
        'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_control', array(
        'label' => 'Footer Logo',
        'priority' => 21,
        'section' => 'title_tagline',
        'settings' => 'footer_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));


	// footer mobile logo
	$wp_customize->add_setting( 'footer_mobile_logo', array(
        'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_mobile_logo_control', array(
        'label' => 'Footer Mobile Logo',
        'priority' => 22,
        'section' => 'title_tagline',
        'settings' => 'footer_mobile_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));






















}
add_action( 'customize_register', 'voyager_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function voyager_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function voyager_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function voyager_customize_preview_js() {
	wp_enqueue_script( 'voyager-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), VOYAGER_VERSION, true );
}
add_action( 'customize_preview_init', 'voyager_customize_preview_js' );