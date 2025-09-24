<?php // Voyager CPTs
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container = get_theme_mod( 'understrap_container_type' ) ?: 'container';

if( have_rows('block_cpt') ): while( have_rows('block_cpt') ): the_row(); 


// layout vars
$th        = '';
if( $args ) {
    $th   = array_key_exists('th', $args) ? $args['th'] : $th;
}

//cpt vars
$cpt       = get_sub_field('cpt_cpt') ?: 'testing';
$layout    = get_sub_field('cpt_layout') ?: 'simple';
$group     = 'voy_'.$cpt;

?>
<div class="voy-cpt <?php echo $group . ' '.$cpt.'-'.$layout; ?> w-100">
    <?php get_template_part('template-parts/flex/rows/partials/'.$cpt.'/'.$layout, null , array('th' => $th)); ?>
</div>


<?php endwhile; endif; // end of file?>
