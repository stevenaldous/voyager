<?php
/**
 * The template for displaying the footer - contact page
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>
<div class="footer-main footer-contact footer bg-white">
    <div class="container">
        <div class="row ">
            <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-center pt-3">
            <?php /*** Social ***/ ?>
                <div class="social-wrap justify-content-end order-md-1 mb-3 mb-md-0">
                    Social Here
                    <?php //get_template_part('template-parts/components/social'); ?>
                </div>
                <?php /*** Copyright info ***/ ?>
                <div class="site-info d-flex flex-column flex-md-row justify-content-start align-items-center">
                    <?php //get_template_part( 'template-parts/modules/footer/partials/copy' ); ?>
                    copyright
                </div>
                
            </div>
        </div>
    </div>
</div>