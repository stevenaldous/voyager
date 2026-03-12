<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

//template vars
$sb     = get_field('sb'); 
$class  = $sb ? 'col-12 col-lg-8' : 'col';  

// defaul theme
$th     = get_field('theme_def','options') ?: 'v-light';



?>
<div class="page-wrapper" id="page-wrapper">
	<div id="content" tabindex="-1">
        <?php /* hero */ get_template_part('template-parts/components/hero/hero', 'page'); ?>
        <?php // page content ?>
            <main class="site-main mt-5" id="main">
                <div class="container">
                    <div class="row">
                        <div class="<?php echo $class; ?>">
                        <div class="<?php echo $th; ?> py-5 mb-5">
                            <?php the_content(  ); ?>
                        </div>
                        <?php get_template_part('/template-parts/components/flex/flex', 'controller'); ?>
                        </div>
                        <?php if( $sb ) { get_template_part('/template-parts/components/sidebars/sidebar'); }; ?>
                    </div>
                </div>
            </main>
        <?php // page content ?>

	</div>
</div>

<?php get_footer();
