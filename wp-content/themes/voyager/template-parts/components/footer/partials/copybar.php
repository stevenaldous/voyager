<?php
/**
 * The template for displaying the footer Copyright Bar
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container = get_theme_mod( 'understrap_container_type' ) ?: 'container-jem';

// copy style Vars
$cop_bg = get_field('copyr_bg','options') ?: ' bg-white';
$cop_th = get_field('copyr_theme','options')  ? ' jem-dark' : ' jem-light';

?>

<div class="copyr <?php echo $cop_bg . $cop_th; ?>">
    <div class="<?php echo esc_attr( $container ); ?>">
        <?php /*** copyright bar Column ***/ ?>
        <div class="row pb-3">
            <?php 
                if( get_field('copyr_bo','options') == 1 ) {
                    echo '<div class="col-12"><div class="border-top w-100 mt-3 border-opacity-25 bo-white"></div></div>';
                }
            ?>
            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-center pt-3">
            <?php /*** Social ***/ ?>
                <div class="social-wrap justify-content-end order-md-1 mb-3 mb-md-0">
                    <?php get_template_part('template-parts/components/social'); ?>
                </div>
                <?php /*** Copyright info ***/ ?>
                <div class="site-info d-flex flex-row justify-content-start align-items-center">
                    <?php get_template_part( 'template-parts/modules/footer/partials/copy' ); ?>
                </div>
                
            </div>
        </div>
    </div>   
</div>