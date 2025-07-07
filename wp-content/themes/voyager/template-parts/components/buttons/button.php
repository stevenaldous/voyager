<?php /* a template to print out majority of site buttons. 
 */

 // Exit if accessed directly.
 defined( 'ABSPATH' ) || exit;
 
// set base vars
$cl = ''; $l  = ''; $wc = ''; $mw = ''; 

if( get_sub_field('link') ) {
    $l  = get_sub_field('link');
    $st = get_sub_field('style') ?: 'btn-primary';
    $st = get_sub_field('btn_style') ?: $st;

    // content Vars
    $w      = get_sub_field('width');
    $wc     = $w ? ' btn-' . $w : '';
    $mw     = get_sub_field('max_width') && $w == 'max' ? 'style="max-width: ' . get_sub_field('max_width') . 'px;"' : '' ;

}
elseif( get_field('link') ) {
    $l  = get_field('link');
    $st = get_field('style') ?: 'btn-primary';
    $st = get_field('btn_style') ?: $st;

    // content Vars
    $w      = get_field('width');
    $wc     = 'btn-' . $w;
    $mw     = get_field('max_width') && $w == 'max' ? 'style="max-width: ' . get_field('max_width') . 'px;"' : '' ;

}
// check for vars passed into template part
if( $args ) {
    $cl  = array_key_exists('cl', $args) ? $args['class'] : $cl;  
}

if($l) {
    $lu = esc_url($l['url']);
    $lt = $l['title'];
    $lx = $l['target'] ? $l['target'] : '_self';

    echo '<a href="'.$lu.'" class="btn '.$st.$wc.'" target="'.$lx.'" '.$mw.'>'.$lt.'</a>';
}

