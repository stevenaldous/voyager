<?php
/**
 * The template Displays the Footer Flex Column - Locations
 * 
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$locs = get_field( 'f_flex_locs', 'options' );

if($locs) {
    foreach($locs as $post) {

        setup_postdata($post);

        // set vars
        $t    = get_field('title_alt') ?: get_the_title() ;
        $url  = get_the_permalink();
        $murl = get_field('map_url') ? '<a href="'.get_field('map_url').'" class="btn no-btn mt-1">Map + Directions</a>' : '';


        // print results
        echo '<div class="loc">
                <a class="subh mb-2 d-block" href="'.get_the_permalink().'">'.$t.'</a>'.
                loc_address('block').
                $murl.
            '</div>';

    } wp_reset_postdata();
}