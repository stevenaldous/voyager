<?php
/**
 * Card colors, theme, etc. 
 *
 * @package Voyager
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// check for and set card settings 
if( $args ) {
    $bg = array_key_exists('bg', $args) ? $args['bg'] : ''; // bg color
    $th = array_key_exists('th', $args) ? ' ' . $args['th'] : ''; // theme
    $bo = array_key_exists('bo', $args) ? ' border ' . $args['bo'] : ''; // border color
    $bw = array_key_exists('bw', $args) ? ' ' . $args['bw'] : ''; // border radius
    $rd = array_key_exists('rd', $args) ? ' ' . $args['rd'] : ''; // border radius
    $sh = array_key_exists('sh', $args) ? ' ' . $args['sh'] : ''; // shadow
}

$card_style = $bg . $th . $bo . $bw . $rd . $sh;