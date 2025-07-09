<?php /* a template to print out majority of site button groups
 */

 // Exit if accessed directly.
 defined( 'ABSPATH' ) || exit;

   

$rep = 'btn_rep'; 
$opt = '';
$cl  = 'flex-column flex-md-row';

if( $args ) {
    $rep = array_key_exists('rep', $args) ? $args['rep'] : $rep; 
    $cl  = array_key_exists('class', $args) ? $args['class'] : $cl; 
    $opt = array_key_exists('opt', $args) ? $args['opt'] : $opt; 
}

//echo 'rep: '.$rep.' opt: '.$opt;

// print buttons
if( have_rows( $rep, $opt ) ) {
    echo '<div class="row g-3 d-flex mt-0 '.$cl.'">';
    while( have_rows( $rep, $opt ) ) {
        the_row();
        // print btn
        echo '<div class="col-auto btn-wrap">';
            get_template_part('template-parts/components/buttons/button', '');
        echo '</div>';
    }
    echo '</div>';

} wp_reset_postdata(); 