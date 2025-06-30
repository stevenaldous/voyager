<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<?php 
	
		wp_head(); // load wp enqueued files
	
		// check for page Javascript  
		// Global JS
		if(have_rows('gjs_rep','options')) {
			while(have_rows('gjs_rep','options')) {
				the_row();
				if( get_sub_field('loc') === 'head') {
					// set dates to check for expiration of script
					$now = new DateTime( date('m/d/Y') );
					$exp = new DateTime( get_sub_field('expdate') );
					$gjs = get_sub_field('js');
					if( $exp ) { if( $exp > $now ) { echo $gjs; } }
					else { echo $gjs; }	
				}
			}	
		}
		// Page JS
		$phjs = get_field('pagejs');
		if($phjs){
			echo $phjs;
		}

	?>
	
</head>

<body <?php body_class(); ?> <?php voyager_body_attributes(); ?> >

<?php do_action( 'wp_body_open' ); ?>

<div class="site" id="page">

	<?php  /******************* The Navbar Area *******************/ 
		// check for sticky header
		$sticky = get_field('sticky_head','options') == 1 ? ' class="sticky-header"' : '';
	?>
	<header id="wrapper-navbar" <?php echo $sticky; ?> class="bg-v1">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'jem' ); ?></a>

		<?php get_template_part('template-parts/components/header/navbar', 'main'); ?>

	</header><?php  /* #wrapper-navbar end */ ?>

