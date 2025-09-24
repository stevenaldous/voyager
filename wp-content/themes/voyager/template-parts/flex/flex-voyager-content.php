<?php
/**
 * Flex Field Controller
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// check if the flexible content field has rows of data
if( have_rows('flex_content') ):

     // loop through the rows of data
    while ( have_rows('flex_content') ) : the_row();

        if( get_row_layout() == 'voy_text' ):

            get_template_part('template-parts/flex/rows/partials/voyager-content-text');

        elseif( get_row_layout() == 'voy_image' ):

            get_template_part('template-parts/flex/rows/partials/image');

        elseif( get_row_layout() == 'voy_accordion' ):

            get_template_part('template-parts/flex/rows/partials/accordion');
    
        elseif( get_row_layout() == 'voy_slider' ):

            get_template_part('template-parts/flex/rows/partials/slider');

        elseif( get_row_layout() == 'voy_cards' ):

            get_template_part('template-parts/flex/rows/partials/cards');
    
    
        elseif( get_row_layout() == 'voy_cpt' ):

            get_template_part('template-parts/components/groups/cpt');
    
    

        endif; 


    endwhile;

endif;