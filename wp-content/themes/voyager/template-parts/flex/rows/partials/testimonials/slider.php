<?php  // Partial for Testimonial Slider

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container = get_theme_mod( 'understrap_container_type' ) ?: 'container-voy';


get_template_part('template-parts/components/sliders/cpt','acf'); 