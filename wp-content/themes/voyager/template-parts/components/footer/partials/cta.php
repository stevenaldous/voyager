<?php
/**
 * The template for displaying the footer CTA/info
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$acf = 'f_cta_';
//CTA/info vars
$t 	    = get_field( $acf.'_t', 'options' );
$sh     = get_field( $acf.'_sh', 'options') ? get_field( $acf.'_sh', 'options' ) : 'p';
$subt	= get_field( $acf.'_subt', 'options' );
$text   = get_field( $acf.'_text', 'options' );
$l      = get_field( $acf.'_link', 'options' );

// title
if($t) { echo '<'.$sh.' class="h2 mb-1 mb-lg-3">'.$t.'</'.$sh.'>'; };
// subtitle
if($subt) { echo '<p class="h4 subt">'.$subt.'</p>'; };
// text
if($text) { echo '<div class="text-wrap mt-4 mt-lg-5">'.$text.'</div>'; };
// button
if($l) {
    $lu = esc_url( $l['url'] );
    $lt = esc_html( $l['title'] );
    $lx = $l['target'] ? esc_attr($l['target']) : '_self';
    echo '<div class="btn-wrap"><a href="'.$lu.'" class="btn btn-primary" target="'.$lx.'">'.$lt.'</a></div>';
}

?>