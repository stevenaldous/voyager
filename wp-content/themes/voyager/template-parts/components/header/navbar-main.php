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

$th  = get_field('nav_theme' , 'options') ? ' v-dark ' : ' v-light ';
$bg  = get_field('nav_bg' , 'options') ?: 'bg-white';
$bgm = get_field('nav_bg_mob' , 'options') && ( $bg == 'nav-trans' )  ? ' ' . get_field('nav_bg_mob' , 'options') : '';

$tf  = get_field('tb_pho_tf', 'options');

$lp  = get_post_type() == 'lp' ? 1 : 0;


?>

<nav id="main-nav" class="navbar navbar-expand-lg flex-column<?php echo $th . $bg . $bgm; ?>" aria-labelledby="main-nav-label">
	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'voyager' ); ?>
	</h2>

	<div class="container-fluid container-xl py-2 order-1">
        <?php get_template_part('template-parts/components/header/partials/logo');  // Site Logo ?>

		<div class="nav-inner animate__animated animate__fadeInDown d-flex flex-grow-1 align-self-center align-items-end justify-content-end align-self-start py-2 pt-lg-0">

			<?php // Top bar for desktop and tablet  ?>
			<div class="d-flex order-lg-1 align-self-center btn-wrap">
				<?php 
					// phone button 
					if($tf && !$lp  ) { 
						get_template_part('template-parts/components/header/partials/phone', 'btn'); 
					}
					elseif ( $lp == 1) {
						get_template_part('template-parts/components/header/partials/phone', 'lp'); 
					}
				
					// Navbar Toggler 
					if( !$lp || get_field('mb_nav_menu') ){
						get_template_part('template-parts/components/header/partials/toggle'); 
					}
				
				?>
			</div>
			
			<?php 
				get_template_part('template-parts/components/header/partials/menu', 'main'); // Main Menu 
			?>

		</div>

	</div><?php // .container(-fluid) ?>

	<?php get_template_part('template-parts/components/header/topbar'); // top bar ?>

</nav><?php // .site-navigation ?>
