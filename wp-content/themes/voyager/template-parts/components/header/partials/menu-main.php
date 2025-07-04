<?php
/**
 * The template for displaying the header Main Menu
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get font awesome weight
$fa  = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';

// vars
$just = get_field('nav_just', 'options') ?: 'end';

// main menu args
$args = array(
	'theme_location'  => 'primary',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'main-menu navbar-nav justify-content-end justify-content-lg-'.$just.' flex-grow-1',
	'fallback_cb'     => '',
	'menu_id'         => 'main-menu',
	'depth'           => 3,
	'walker'          => new Voyager_WP_Bootstrap_Navwalker(),
);

?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNavOffcanvas">
	<div class="offcanvas-header justify-content-between">
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
			<i class="<?php echo $fa; ?> fa-xmark" aria-hidden="true"></i>
		</button>
	</div><!-- .offcanvas-header -->
	<div class="offcanvas-body d-flex flex-column px-4 pt-4 pt-lg-3 px-lg-0">
		<div class="d-lg-flex align-items-lg-center justify-content-lg-end position-relative order-1">
			<?php
				wp_nav_menu( $args );
				
				get_template_part('template-parts/components/header/partials/search'); // Search
			?>
		</div>
	</div>
	<!-- The WordPress Menu goes here -->
	

</div><!-- .offcanvas -->