<?php
/**
 * The template for displaying the footer - contact page
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$cop_bg = get_field('copyr_bg','options') ?: ' bg-white';
$cop_th = get_field('copyr_theme','options')  ? ' v-dark' : ' v-light';

?>
<div class="footer-main footer-contact footer <?php echo $cop_bg . $cop_th; ?> copyr">
    <div class="container">
        <div class="row pb-3">
            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-center pt-3">
            <?php /*** Social ***/ ?>
                <div class="social-wrap justify-content-end order-md-1 mb-3 mb-md-0">
                    <?php get_template_part('template-parts/components/buttons/social'); ?>
                </div>
                <?php /*** Copyright info ***/ ?>
                <div class="site-info d-flex flex-row justify-content-start align-items-center">
                    <?php get_template_part( 'template-parts/components/footer/partials/copybar-copy' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>