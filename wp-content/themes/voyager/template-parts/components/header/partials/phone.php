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
<!-- <div class="phone-cta d-flex align-items-center"> -->
    <a href="tel:+<?php echo $ctry . $pho; ?>" aria-label="Call Us" class="btn btn-pho no-btn ms-3 ">
        <?php 
            // check for text
            if($hptb) { echo '<span class="mb-0 d-none d-xl-inline-block">' . $hptb . '</span>'; } 

            echo '<i class="fa-solid fa-phone mx-2" aria-hidden="true"></i>';

            echo '<span class="mb-0 d-none d-md-inline-block">'.phone($ctry, $pho, 'textDots').'</span>';
        ?>
       
    </a>
<!-- </div> -->