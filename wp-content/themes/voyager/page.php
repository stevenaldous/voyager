<?php
/**
 * The template for displaying all pages
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

//template vars
$sb     = get_field('sb'); 
$class  = $sb ? 'col-12 col-lg-8' : 'col';  

?>
<div class="page-wrapper" id="page-wrapper">
	<div id="content" tabindex="-1">
        <?php /* hero */ get_template_part('template-parts/modules/hero/hero', 'page'); ?>
        <?php // page content ?>
            <main class="site-main mt-5" id="main">
                <div class="container">
                    <div class="row">
                        <div class="<?php echo $class; ?>">
                        <?php the_content(  ); ?>
                        <?php get_template_part('/template-parts/modules/flex/flex', 'controller'); ?>
                        </div>
                        <?php if( $sb ) { get_template_part('/template-parts/modules/sidebars/sidebar'); }; ?>
                    </div>
                </div>
            </main>
        <?php // page content ?>

	</div>
</div>

<?php get_footer();
