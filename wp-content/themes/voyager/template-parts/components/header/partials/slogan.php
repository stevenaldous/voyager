<?php
/**
 * The template for displaying the header Slogan
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
 
 // vars
$slo    = get_field('hp_slogan','options');
$slo_es = get_field('hp_slogan_es','options');

if( $slo || $slo_es ) {
    echo '<div class="head-slogan h-100">';


    // print slogan if filled
    if( $slo )    { echo '<p class="slo">'.$slo.'</p>'; }

    // print espanol slogan if filled
    if( $slo_es ) { echo '<p class="slo-es d-none d-md-block">'.$slo_es.'</p>'; }

    echo '</div>';
}

?>