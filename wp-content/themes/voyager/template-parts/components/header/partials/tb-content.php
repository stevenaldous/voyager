<?php
/**
 * The template for displaying the Top Bar content and/or WPML code
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

    // Text Vars
    $text       = get_field('tb_text', 'options') ?: '';
    $vh         = get_field('tb_vh', 'options') ?: 'h6';
?>

<div class="tb-cont d-none d-md-flex align-items-center justify-content-start flex-grow-1 pe-3">
    <?php 
        if($text) {
            echo '<div class="flex-grow-1"><p class="'.$vh.' mb-0">'.$text.'</p></div>';
        }
    ?> 
</div>