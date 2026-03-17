<?php
/**
 * Top Bar
 *
 * @package Voyager
 * 
 * 
 */

    // content status checks
    $con_tf   = get_field('tb_con_tf', 'options') ?: false;
    $wpml_tf  = get_field('tb_wpml_tf', 'options') ?: false;
    // styling
    $bg       = get_field('tb_bg', 'options') ?: 'bg-v2';
    $th       = get_field('tb_th', 'options') ?: 'v-dark';
    $cta       = get_field('nav_cta', 'options');
    $lp       = get_post_type() == 'lp' ? 1 : 0;
 
    $jus     = $con_tf ? 'justify-content-between' : 'justify-content-end';

?>
<div class="top-bar <?php echo $bg . ' ' . $th; ?> w-100 py-md-2 py-lg-3 order-0">
    <div class="container-fluid d-flex <?php echo $jus; ?> align-items-center px-0 px-md-3">
        <?php 
            // if content or WPML, get left side component
            if( $con_tf ) { get_template_part('template-parts/components/header/partials/tb-content'); } // phone CTA ?>
        <?php // Phone and Button ?>
    
        <?php 
            if( $cta == 'phone')    { get_template_part('template-parts/components/header/partials/cta-phone-lg'); } // phone CTA
            elseif( $cta == 'btn' ) { get_template_part('template-parts/components/header/partials/cta-btn-lg'); }
        ?>
    </div>
</div>