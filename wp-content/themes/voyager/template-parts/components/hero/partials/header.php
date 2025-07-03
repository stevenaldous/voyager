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




//////////////////////////
// default vars
//////////////////////////
// theme
$th = get_field('hero_theme','options') ? ' jem-dark' : ' jem-light';
// align vars
$align    = get_field('hero_align','options') ? 'text-' . get_field('hero_align','options') : 'text-center';
$align_lg = get_field('hero_align','options') ? ' text-lg-' . get_field('hero_align_lg','options') : '';
// btn alignment
$btn_al    = get_field('hero_align','options') ? 'justify-content-' . get_field('hero_align','options') : 'justify-content-center';
$btn_al_lg = get_field('hero_align','options') ? ' justify-content-lg-' . get_field('hero_align_lg','options') : '';

// content vars
$sh     = 'h1';
$vh     = 'h1';
$btns   = '';
$acc    = '';


//////////////////////////
// override vars
//////////////////////////
// page template overrides
$acf = 'hero_';
$opts = '';
if( is_404() == true ) { // 404 page
    $acf = 'err_'; 
    $opts = 'options'; 
}
elseif ( is_home() ) { // blog archice
    $acf = 'blog_h_'; 
    $opts = 'options'; 
}
elseif ( is_single() && $pt == 'post' ) { // blog single
    $acf = 'hero_';
    $opts = '';
    $th = get_field('bsh_theme','options') ?: $th;
}
elseif ( is_archive() ) {
    $acf = $pt.'_h_';
    $opts = 'options';
}


// alignment override
if( get_field($acf . 'align',$opts) )    { 
    $align    = 'text-' . get_field($acf . 'align',$opts); 
    $btn_al   = 'justify-content-' . get_field($acf . 'align',$opts);
}
if( get_field($acf . 'align_lg',$opts) ) { 
    $align_lg  = ' text-lg-' . get_field($acf . 'align_lg',$opts); 
    $btn_al_lg = ' justify-content-lg-' . get_field($acf . 'align_lg',$opts);
} 

if( get_field($acf . 'txt_align',$opts) )    { 
    $align    = 'text-' . get_field($acf . 'txt_align',$opts); 
    $btn_al   = 'justify-content-' . get_field($acf . 'txt_align',$opts);
}
if( get_field($acf . 'txt_align_lg',$opts) ) { 
    $align_lg  = ' text-lg-' . get_field($acf . 'txt_align_lg',$opts); 
    $btn_al_lg = ' justify-content-lg-' . get_field($acf . 'txt_align_lg',$opts);
} 




// Home options (header bg and order)
$bg    = get_field('hero_head_bg') ?: false;
$op    = get_field('hero_opacity') ? ( get_field('hero_opacity') / 100 ) : 1;
$bo    = get_field('hero_head_bo') ? ' border border-3 ' . get_field('hero_head_bo') : false;
$rnd   = get_field('hero_head_rad') ? ' rounded-3 ' : '';
$order = get_field( 'img_opt_order' ) ?: false;


// text vars
$pret   = get_field( $acf . 'pret', $opts );
$pref   = get_field( $acf . 'pret_flair', $opts ) ? ' flair': '';
$t      = get_field( $acf . 'title', $opts ) ? get_field( $acf . 'title', $opts ) : get_the_title();
$acc    = get_field( $acf . 'title_flair', $opts ) ? ' flair': '';
$subt   = get_field( $acf . 'subt', $opts );
$text   = get_field( $acf . 'text', $opts );

// theme override
if( get_field($acf . 'theme',$opts) ) { $th = get_field($acf . 'theme',$opts); };

// buttons
if( get_field( $acf.'btn_rep', $opts ) ) {
    $btns  = array( 
        'rep'   => $acf.'btn_rep',
        'class' => 'flex-column flex-md-row '. $btn_al . $btn_al_lg,
        'opt'   => $opts
    );
}



// animation 
$anim   = 'fadeInUp';

// blog post single
if( $pt == 'post' && is_single() ) {
    // set post vars
    $date   = get_the_date( 'M j, Y' );
    $author_id = get_post_field ('post_author', $id);
    $auth = get_the_author_meta( 'display_name' , $author_id );
    // write post subt with post vars
    $subt   = 'Posted on '.$date . '   by ' . $auth;
}
// archive page title backup
elseif( is_archive() ) {
    $t = get_field( $acf . 'title', $opts ) ?: 'All ' . ucwords($pt);
}
// resource subt
elseif( is_single() && $pt == 'resources') { $subt  = get_field('authors') ? 'By ' . get_field('authors') : ''; }
// category title
elseif (is_category()) { $term   = get_queried_object(); $t = $term->name; } 
// tag title
elseif (is_tag()) {  $t = get_the_title(); } 
// author title
elseif (is_author()) { $t = '<span class="vcard">' . get_the_author() . '</span>'; } 
//for custom post types (May not be in use in this jem version)
elseif (is_tax()) {  $t = 'All ' . get_post_type(); }
// date archive title
elseif (is_date()) { $t = sprintf( __( 'Archive: %s' ), get_the_date( _x( 'Y', 'Annual archives date format' ) ) ); }
// search title
elseif (is_search()) { $t = 'Search Results For: ' . get_search_query(); }
// thank you template Text
elseif( is_page_template( 'page-templates/thanks.php' ) ) { $text = get_field('content'); }

?>

<header class="rounded <?php echo  $th. ' '. $align . $align_lg . $bo . $rnd; if($order) { echo ' order-1'; } if($bg) { echo ' has-bg'; } if ( $anim ) {echo ' animate__animated animate__' .$anim; } ?>">
    <?php
        if($bg) { echo '<div class="head-bg abs-cover '.$bg.' bg-blur" style="opacity: '.$op.';"></div>' ;}

        if($pret) { echo '<p class="pret'.$pref.' mb-3">'. $pret . '</p>'; };
        // print title w/options
        echo '<' . $sh . ' class="' . $vh . $acc . '">'. $t . '</' . $sh . '>'; 
        // print Subtitle if present
        if($subt) { echo '<p class="subt mb-0">'. $subt . '</p>'; };
        // print Text
        if($text) { echo '<div class="text-wrap my-3">'. $text . '</div>'; };
        // get buttons
        if($btns) { get_template_part('template-parts/components/button','group', $btns ) ;}
    ?>
</header>