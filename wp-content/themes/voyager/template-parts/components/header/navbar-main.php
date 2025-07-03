<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Jem
 * 
 * 
 * 
 *  This built from the Bootstrap Offcanvas Navbar: https://getbootstrap.com/docs/5.2/components/navbar/#offcanvas
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$th = 1 > 2 ? 'navbar-light ' : '';
$bg = get_field('nav_bg' , 'options') ?: 'bg-white';

$bg = is_single() && get_post_type() == 'team' ? $bg  : $bg . ' bg-lg-trans' ;
$tf = get_field('tb_pho_tf', 'options');

// get font awesome weight
$fa = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';

?>

<nav id="main-nav" class="navbar navbar-expand-lg flex-column <?php echo $th . $bg; ?>" aria-labelledby="main-nav-label">
	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>

	<?php // Top bar for mobile  ?>
	<?php get_template_part('template-parts/components/header/topbar'); ?>

	<div class="container-fluid">
        <?php get_template_part('template-parts/components/header/partials/logo');  // Site Logo ?>

		<div class="nav-inner animate__animated animate__fadeInDown d-flex flex-md-column flex-grow-1 align-self-center align-items-end justify-content-end align-self-start py-2 pt-lg-0">

			<?php // Top bar for desktop and tablet  ?>
			<div class="d-flex d-lg-none">
				<?php // Phone and Button ?>
				<?php if($tf) { get_template_part('template-parts/components/header/partials/phone', 'btn'); } // phone button ?>
		
				<?php // Navbar Toggler ?>
				<button class="navbar-toggler ms-3 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<i class="<?php echo $fa; ?> fa-solid fa-align-left"></i>
				</button>
			</div>
			
			<?php 
				if( get_post_type() == 'lp' ) {
					$menu = get_field('mb_nav_menu');
					if($menu) { get_template_part('template-parts/components/header/partials/menu', 'main'); }
				}
				else {
					get_template_part('template-parts/components/header/partials/menu', 'main'); // Main Menu 
				}
					
			?>

		</div>

	</div><?php // .container(-fluid) ?>

</nav><?php // .site-navigation ?>
