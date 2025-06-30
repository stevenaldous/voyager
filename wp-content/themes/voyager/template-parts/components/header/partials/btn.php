<?php
/**
 * The template for displaying the header Phone Button
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
 

if( have_rows( 'tb_rep','options' ) ) {
    while( have_rows( 'tb_rep','options' ) ) {
        the_row();

        // print btn
        echo '<div class="btn-wrap ms-md-4">';
            get_template_part('template-parts/components/button', '');
        echo '</div>';
    }
} wp_reset_postdata();
?>