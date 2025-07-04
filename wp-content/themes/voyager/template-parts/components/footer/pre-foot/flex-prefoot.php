<?php
/**
 * The template for displaying the awards and cases before the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



    // check if the flexible content field has rows of data
    if( have_rows('flex_prefoot','options') ):

        echo '<div class="pre-footer">';
    
         // loop through the rows of data
        while ( have_rows('flex_prefoot','options') ) : the_row();
    
            if(  get_row_layout() == 'locs' ):
    
                get_template_part('template-parts/modules/footer/pre-foot/rows/locs');
    
            elseif( get_row_layout() == 'cta' ):
    
                get_template_part('template-parts/modules/footer/pre-foot/rows/cta');

            endif; 

        endwhile;

        echo '</div>';
    endif;

?>