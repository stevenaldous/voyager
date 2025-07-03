<?php
/**
 * Hero Partial - Header Content
 *
 * @package Jem
 * 
 * 
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get post type
$pt = get_post_type();

// theme
$th     = get_field('hero_theme','options') ? ' jem-dark' : ' jem-light';


// align vars
$align    = get_field('hero_align','options') ? 'text-' . get_field('hero_align','options') : 'text-center';
$align_lg = get_field('hero_align','options') ? ' text-lg-' . get_field('hero_align_lg','options') : '';

$btn_type = get_field('hero_buttons') ?: 'none';
// btn alignment
$btn_al    = get_field('hero_align','options') ? 'justify-content-' . get_field('hero_align','options') : 'justify-content-center';
$btn_al_lg = get_field('hero_align','options') ? ' justify-content-lg-' . get_field('hero_align_lg','options') : '';

// alignment override
if( get_field('hero_align') )    { 
    $align    = 'text-' . get_field('hero_align'); 
    $btn_al   = 'justify-content-' . get_field('hero_align');
}
if( get_field('hero_align_lg') ) { 
    $align_lg  = ' text-lg-' . get_field('hero_align_lg'); 
    $btn_al_lg = ' justify-content-lg-' . get_field('hero_align_lg');
} 

if( get_field('hero_txt_align') )    { 
    $align    = 'text-' . get_field('hero_txt_align'); 
    $btn_al   = 'justify-content-' . get_field('hero_txt_align');
}
if( get_field('hero_txt_align_lg') ) { 
    $align_lg  = ' text-md-' . get_field('hero_txt_align_lg'); 
    $btn_al_lg = ' justify-content-md-' . get_field('hero_txt_align_lg');
} 

// content vars
$sh     = 'h1';
$vh     = 'h1';
$btns   = '';
$acc    = '';

// Home options (header bg and order)
$bg    = get_field('hero_head_bg') ?: false;
$op    = get_field('hero_opacity') ? ( get_field('hero_opacity') / 100 ) : 1;
$bo    = get_field('hero_head_bo') ? ' border border-3 ' . get_field('hero_head_bo') : false;
$rnd   = get_field('hero_head_rad') ? ' rounded-3 ' : '';
$order = get_field( 'img_opt_order' ) ?: false;

// content vars
$pret   = get_field( 'hero_pret'  );
$pref   = get_field( 'hero_pret_flair'  ) ? ' flair': '';
$t      = get_field( 'hero_title' ) ? get_field( 'hero_title'  ) : get_the_title();
$acc    = get_field( 'hero_title_flair'  ) ? ' flair': '';
$subt   = get_field( 'hero_subt'  );
$text   = get_field( 'hero_text'  );

if( get_field('hero_theme') ) { $th   = get_field('hero_theme'); };

if( get_field( 'hero_btn_rep' ) ) {
    $btns  = array( 
        'rep'   => 'hero_btn_rep',
        'class' => 'flex-column flex-md-row '. $btn_al . $btn_al_lg,
    );
}
// animation 
$anim   = 'fadeInUp';

?>
<header class="rounded <?php echo  $th. ' '. $align . $align_lg . $bo . $rnd; if($order) { echo ' order-1'; } if($bg) { echo ' has-bg'; } if ( $anim ) {echo ' animate__animated animate__' .$anim; } ?>">
    <?php
        if($bg) { echo '<div class="head-bg abs-cover '.$bg.' bg-blur" style="opacity: '.$op.';"></div>' ;}

        if($pret) { echo '<p class="pret'.$pref.' mb-0">'. $pret . '</p>'; };
        // print title w/options
        echo '<' . $sh . ' class="' . $vh . $acc . '">'. $t . '</' . $sh . '>'; 
        // print Subtitle if present
        if($subt) { echo '<p class="subt mb-0">'. $subt . '</p>'; };
        // print Text
        if($text) { echo '<div class="text-wrap my-3">'. $text . '</div>'; };

        // determine button soultion to use. 
        if( $btn_type == 'pop') {
            // pop btn vars
            $p_t  = get_field('pop_btn');
            $p_st = get_field('pop_btn_style') ?: 'btn-secondary-accent';

            // other btn vars
            $l    = get_field('hero_btn');

            // get buttons
            echo'<div class="btn-wrap d-flex flex-column '.$btn_al . $btn_al_lg.' flex-xl-row mt-4">';
        

            // Button trigger modal
            echo '<button type="button" class="btn '.$p_st.'" data-bs-toggle="modal" data-bs-target="#homeFormModal">'.$p_t.'</button>';

            if($l) {
                $b_st = get_field('hero_btn_style') ?: 'btn-outline';

                $lu = esc_url($l['url']);
                $lt = $l['title'];
                $lx = $l['target'] ? $l['target'] : '_self';
            
                echo '<a href="'.$lu.'" class="btn '.$b_st.' mt-4 mt-xl-0 ms-xl-4 d-inline-block" target="'.$lx.'">'.$lt.'</a>';
            }
        echo '</div>';
        }
        // standard linked buttons
        else if($btn_type == 'main') {
            if($btns) {  get_template_part('template-parts/components/button','group', $btns ) ;}
        }
    ?>
</header>