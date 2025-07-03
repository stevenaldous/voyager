<?php
/**
 * The template for displaying the Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' ) ?: 'container-jem';

$mt = ( get_field('hero_layout') == 'bar' ) && get_field( 'hero_bar_style' ) ? 'margin-bar' : '';

?>
<div class="page-wrapper " id="page-wrapper">
	<div id="content" tabindex="-1">

        <?php /* hero */ get_template_part('template-parts/components/hero/hero', 'home'); ?>

        <?php // page content ?>
            <main class="site-main <?php echo $mt; ?>" id="main">                
                <?php  get_template_part('template-parts/modules/home/home-flex'); // get home flex controller ?>
            </main>
        <?php // page content ?>

	</div>
</div>

<?php get_footer();

