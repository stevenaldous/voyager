<?php
/**
 * The template for displaying the accredition logo
 * @package Voyager
 */

    $img = get_field('f_con_img','options');

    if($img){  echo '<div class="img-wrap badge">'. wp_get_attachment_image($img, 'medium') . '</div>'; }