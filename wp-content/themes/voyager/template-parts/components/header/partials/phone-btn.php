<?php
/**
 * The template for displaying the header Phone Button
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
 
 // vars
$hpt1 = get_field('hp_txt1','options');
$hpt2 = get_field('hp_txt2','options');
$hptb = get_field('hp_txtb','options');

$ctry 	= get_field('pho_ctry','options');
$pho 	= get_field('pho','options');
?>
<div class="d-flex align-items-center">
    <div class="phone-cta ms-3 d-flex align-items-center">
        <a href="tel:+<?php echo $ctry . $pho; ?>" aria-label="Call Us" class="btn btn-pho">
            <?php  echo '<i class="fa-solid fa-phone mx-2" aria-hidden="true"></i>'; ?>
        </a>
    </div>
</div>