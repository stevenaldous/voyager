<?php
/**
 * The template for displaying the header content
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$con = get_field('tb_con', 'options');

if( $con ) {
    echo '<div class="tb-cont mx-3 mx-md-0">'.$con.'</div>';
}

?>