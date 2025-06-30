<?php
/**
 * Top Bar
 *
 * @package Jem
 * 
 * 
 */

    // vars
    $hide_tb = get_field('hide_top_block', 'options') ?: false;
    $con_tf  = get_field('tb_con_tf', 'options') ?: false;
    $bg      = get_field('tb_bg', 'options') ?: 'bg-dark';
    $th      = get_field('tb_th', 'options') ? ' jem-dark': ' jem-light';
    $tf      = get_field('tb_pho_tf', 'options');

    $jus     = $con_tf ? 'justify-content-between' : 'justify-content-end';

    if( $hide_tb ):
?>
<div class="top-bar <?php echo $bg . $th; ?> w-100 py-md-2 py-lg-3">
    <div class="container-fluid d-flex <?php echo $jus; ?> align-items-center px-0 px-md-3">
    <?php if($con_tf) { get_template_part('template-parts/modules/header/partials/tb-content'); } // phone CTA ?>
    <?php // Phone and Button ?>
    <div class="wrap-end d-flex">
        <?php get_template_part('template-parts/modules/header/partials/btn'); // button ?>
        <?php if($tf) { get_template_part('template-parts/modules/header/partials/phone'); } // phone CTA ?>
    </div>
    
    </div>
</div>
<?php endif; ?>