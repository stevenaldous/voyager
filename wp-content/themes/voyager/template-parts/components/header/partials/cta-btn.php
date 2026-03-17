<?php
/**
 * The template for displaying the header CTA Button on Mobile
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get font awesome weight
$fa     = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';

// vars
$st     = get_field('nav_cta_style','options') ?: 'no-btn';
$i      = get_field('nav_cta_icon','options') ?: 'fa-mail';


$btn    = get_field('nav_cta_btn','options');


if($i) {
    $i = '<i class="'.$fa.' '.$i.' me-2"></i>';
}

if($btn) {
    $lu = esc_url($btn['url']);
    $lt = $btn['title'];
    $lx = $btn['target'] ? $btn['target'] : '_self';

    echo '<a href="'.$lu.'" class="btn '.$st.' btn-cta d-lg-none" target="'.$lx.'">'.$i.'</a>';
}
?>