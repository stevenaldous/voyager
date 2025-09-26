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


$forms = wsf_form_get_all( );

?>
<div class="footer-main footer pt-4">
    <div class="container">
        <div class="row ">
            <?php /*** Form Column ***/ ?>
                <div class="col-12 col-md-6 col-lg-7 col-end order-md-1 d-flex flex-column align-items-center justify-content-start"> 
                    <div class="d-md-none text-center">
                        <?php /*** Logo ***/ ?>
                        <?php get_template_part( 'template-parts/components/footer/partials/logo' ); ?>
                    </div>
                    <?php /*** Form ***/ ?>
                    <?php get_template_part( 'template-parts/components/footer/partials/form' ); ?>
                </div>
                <?php /*** Form Column ***/ ?>
                <?php /*** Info Column ***/ ?>
                <div class="col-12 col-md-6 col-lg-5 col-start order-md-0">
                    <div class="d-none d-md-block">
                        <?php get_template_part( 'template-parts/components/footer/partials/logo' ); ?>
                    </div>
                    <?php /*** Location + Logo ***/ ?>
                    <div class="f-loc text-center text-md-start mt-4 mt-md-0">
                        <?php get_template_part( 'template-parts/components/footer/partials/main' ); ?>
                    </div>   
                </div>
        </div>
    </div>
</div>