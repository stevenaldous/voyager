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

// phone vars
$ctry 	= get_field('pho_ctry','options');
$pho 	= get_field('pho','options');

// btn style vars
$btn_st = get_field('tb_pho_style','options') ?: 'no-btn';
$icon   = get_field('tb_pho_icon','options') ?: 'fa-phone';
 
?>
<div class="d-flex align-items-center d-lg-none">
    <a href="tel:+<?php echo $ctry . $pho; ?>" aria-label="Call Us" class="btn btn-pho <?php echo $btn_st; ?>">
        <?php  echo '<i class="'.$fa.' '.$icon.' mx-2" aria-hidden="true"></i>'; ?>
    </a>
</div>


