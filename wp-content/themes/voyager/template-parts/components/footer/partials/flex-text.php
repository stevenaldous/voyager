<?php
/**
 * The template Displays the Footer FLex Column - Text Area
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$text = get_field( 'f_flex_text', 'options' );

if($text) { echo '<div class="text-wrap mb-4">'.$text.'</div>'; }