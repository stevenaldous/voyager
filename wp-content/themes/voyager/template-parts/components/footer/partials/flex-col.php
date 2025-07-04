<?php
/**
 * The template sets up the initial logic for the flex footer column
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$acf = 'f_flex_';
$opt = 'options';

// text vars
$t      = get_field( $acf.'title', $opt );
$vh     = get_field( $acf.'vh', $opt ) ?: 'h4';
//flex vars
$flex   = get_field( $acf.'select', $opt ) ?: '';

if($t)    { echo '<h2 class="' .$vh.' mb-4">'.$t.'</h2>'; }

if($flex) { get_template_part('template-parts/modules/footer/partials/flex', $flex); }

?>
