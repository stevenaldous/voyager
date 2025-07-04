<?php
/**
 * The template for displaying the header Phone Button
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get font awesome weight
$fa  = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';

// vars
$ctry 	= get_field('pho_ctry','options');
$pho 	= get_field('pho','options');
$pho_t  = get_field('tb_pho_text','options');
$btn_st = get_field('tb_pho_style_tb','options') ?: 'no-btn';
$icon   = get_field('tb_pho_icon_lg','options');
$ph_st  = get_field('pho_style','options') ?: '';

// lp override
if(get_post_type() == 'lp') {
    $pho    = get_field( 'phone' ) ?: $pho;
    $pho_t  = get_field( 'phone_text' );
}



?>
<a href="tel:+<?php echo $ctry . $pho; ?>" aria-label="Call Us" class="btn btn-pho <?php echo $btn_st; ?>">
    <?php 
        // check for text
        if($pho_t) { echo '<span class="mb-0 me-2">' . $pho_t . '</span>'; } 

        if( $icon ) { echo '<i class="'.$fa.' '.$icon.' me-2" aria-hidden="true"></i>'; }

        echo '<span class="mb-0">'.phone($ctry, $pho, 'text_'.$ph_st).'</span>';
    ?>
    
</a>