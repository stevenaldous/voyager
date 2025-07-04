<?php
/**
 * Hero Partial - Header Content
 *
 * @package Voyager
 * 
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container = get_theme_mod( 'understrap_container_type' ) ?: 'container-jem';

$bg     = get_field( 'hero_bar_bg' ) ?:  'bg-white'; 
$bg_img = get_field( 'hero_bar_img' ) ?: '';
$th     = get_field( 'hero_bar_theme') ? ' jem-dark' : ' jem-light';
$fa     = get_field( 'fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';
$c_al   = get_field( 'card_txt_align') ? ' text-'.get_field( 'card_txt_align') : ' text-start';
$bar_st = get_field( 'hero_bar_style' ) ?: 'cont';
$shad   = get_field( 'hero_bar_tf' )  ? ' shadow' :  '';
$rnd    = get_field( 'hero_bar_rnd' )  ? ' ' . get_field( 'hero_bar_rnd' ) : '';

$colp   = ( $bar_st == 'cont-gaps' ) ? 'px-4' :  'px-0';
'';

if( $bg == 'bg-img' && $bg_img ) {
    $bg_img = "background-image: url('".wp_get_attachment_url($bg_img, 'full')."');";
}

if( have_rows('hero_features') ):


if( $bar_st == 'full' ):
?>
<div class="align-self-end hero-bar <?php echo $bg; ?>">
    <div class="container-fluid">
<?php else: ?>
        <div class="<?php echo esc_attr($container); ?> ">
            <div class="align-self-end hero-bar <?php echo $bg . $shad . $rnd; ?>">
<?php endif; ?>
        <div class="row">
            <?php // display features
                while( have_rows('hero_features') ) {
                    $th  = get_field( 'hero_bar_theme') ? ' jem-dark' : ' jem-light';
                    the_row();
                    $i   = get_sub_field('icon');
                    $t   = get_sub_field('title');
                    $txt = get_sub_field('text');
                    $l   = get_sub_field('link');
                    // styling overrides
                    $bg  = get_sub_field('bg_over') ?: 'bg-trans';
                    $th  = get_sub_field('th_over') ? ' '.get_sub_field('th_over'): $th;

                    // print out card
                    echo '<div class="col-12 col-md-6 col-lg py-2 py-md-4 py-lg-0 '.$colp.'"><div class="feat h-100 p-4 py-lg-5 '.$bg.$th.$c_al.'">';
                        if($i)   { echo '<div class="i-wrap mb-2 mb-lg-3"><i class="'.$fa.' '.$i.'" aria-hidden="true"></i></div>'; }

                        if($t && $l ) { echo '<a href="'.$l.'" class="h6 mb-1 mb-lg-2">'.$t.'</a>'; }
                        elseif ($t)   { echo '<p class="h6 mb-1 mb-lg-2">'.$t.'</p>'; }
                        
                        if($txt) { echo '<p class="text mb-0">'.$txt.'</p>'; }
                    echo '</div></div>';
                } wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
<?php
    //if( $bar_st == 'full' ) { echo '</div>'; } 
endif;
?>