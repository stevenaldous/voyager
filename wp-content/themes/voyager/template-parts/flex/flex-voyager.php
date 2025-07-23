<?php
/**
 * Flex Field Controller
 *
 * @package Voyager
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$flex = 'flex_voyager';

// check if the flexible content field has rows of data
if( have_rows($flex) ):

     // loop through the rows of data
    while ( have_rows($flex) ) : the_row();

        if(  get_row_layout() == 'voyager_content' ):

            get_template_part('template-parts/flex/rows/voyager-content');

        elseif( get_row_layout() === 'voyager_content_row' ):

            get_template_part('template-parts/flex/rows/voyager-content-row');

        elseif( get_row_layout() == 'spotlight' ):

            get_template_part('template-parts/flex/rows/spotlight');

        elseif( get_row_layout() == 'values' ):

            get_template_part('template-parts/flex/rows/values');


        endif; 
 

    endwhile;

endif;