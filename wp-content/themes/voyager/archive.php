<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$pt = get_post_type();

// get site container width
$container = get_theme_mod( 'voyager_container_type' ) ?: 'container';

// page content vars
$t     = get_field( $pt.'_a_title', 'options' ); // Title
$vh    = get_field( $pt.'_a_title_vh', 'options' ) ? get_field( $pt.'_a_title_vh', 'options' ) : 'h2';
$tf    = get_field( $pt.'_a_title_flair', 'options' ) ? ' flair': '';
$tal   = get_field( $pt.'_a_title_align', 'options' ) ?: 'text-start';
$con   = get_field( $pt.'_a_content', 'options' ); // Content
$cal   = get_field( $pt.'_a_content_align', 'options' ) ?: 'text-start';

?>

<div class="page-wrapper archive-<?php echo $pt; ?>" id="archive-wrapper">
    <div id="content" tabindex="-1">
        <?php /* hero */ get_template_part('template-parts/components/hero/hero', 'page'); ?>

        <?php // page content ?>
            <main class="site-main mb-5" id="main">
                <div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row my-4">
                        <div class="col">
                            <?php 
                                // if content entered, display
                                if( $t ) { echo '<header class="content '.$tal.'"><h2 class="'.$vh . $tf.'">'.$t.'</h2></header>'; }; 
                                // if content entered, display
                                if( $con ) { echo '<div class="content '.$cal.'">'.$con.'</div>'; }; 

                        
                                if ( have_posts() ) {
                            
                                    if( $pt == 'post' ) {
                                        get_template_part('templates/layouts/archives/archive', $pt );
                                    } 
                                    elseif($pt) {
                                        get_template_part('templates/layouts/archives/pta', $pt, array('cpt' => $pt) );
                                    }
                                    else {
                                        echo '<p class="h4">Houston, we have a problem.</p>'; 
                                    }
                                } else {
                                    get_template_part( 'loop-templates/content', 'none' );
                                }

                            ?>
                        </div>
                        <?php if( $pt != 'post' ) { get_template_part('/template-parts/modules/sidebars/sidebar'); } ?>
                    </div>
                </div>
            </main>
        <?php // page content ?>
	</div>
</div>

<?php get_footer();
