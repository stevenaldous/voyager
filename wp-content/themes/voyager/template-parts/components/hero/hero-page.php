<?php
/**
 * Hero - Page
 *
 * @package Voyager
 * 
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container = get_theme_mod( 'understrap_container_type' ) ?: 'container-jem';

$pt = is_search() ? 'search' : get_post_type();

// template Vars
$id     = get_the_ID();

//Over Lay vars
$over   = get_field('hero_over','options');
$obg    = get_field('hero_over_bg','options' ) ?: 'bg-dark';
$op     = get_field('hero_over_opacity','options') ? ( get_field('hero_over_opacity','options') / 100 ) : 0.3;

// background vars
$bg     = get_field('hero_bg', 'options') ?: 'bg-jem1';
$img    = get_field('hero_img','options');
$img_lg = get_field('hero_img_lg','options');


// align vars
$al  = get_field('hero_align','options') ? ' align-items-' . get_field('hero_align','options') : ' align-items-center';
$ju  = get_field('hero_just','options') ? ' justify-content-' . get_field('hero_just','options') : ' justify-content-center';
$al_lg = get_field('hero_align_lg','options') ? ' align-items-lg-' . get_field('hero_align_lg','options') : ' align-items-lg-center';
$ju_lg = get_field('hero_just_lg','options') ? ' justify-content-lg-' . get_field('hero_just_lg','options') : ' justify-content-lg-center';


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
    $acf = 'bsh_'; 
    $opts = 'options'; 
}
elseif ( is_archive() ) {
    $acf = $pt.'_h_';
    $opts = 'options'; 
}

// overlay vars
if( get_field($acf . 'over', $opts)  )    { $over = get_field($acf . 'over', $opts) == 'true' ? 1 : 0 ; };
if( get_field($acf . 'over_bg', $opts)  ) { $obg = get_field($acf . 'over_bg', $opts); };
if( get_field($acf . 'over_opacity', $opts) ) { $op = get_field($acf . 'over_opacity', $opts) / 100; };
// alignment vars
if( get_field($acf . 'align', $opts) )    { $al = ' align-items-' . get_field($acf . 'align', $opts); }
if( get_field($acf . 'just', $opts) )     { $ju = ' justify-content-' . get_field($acf . 'just', $opts); }
if( get_field($acf . 'align_lg', $opts) ) { $al = ' align-items-' . get_field($acf . 'align', $opts); }
if( get_field($acf . 'just_lg', $opts) )  { $ju = ' justify-content-' . get_field($acf . 'just', $opts); }
// bg var overrides
if( get_field($acf . 'bg', $opts) ) {
    $bg     = get_field($acf . 'bg', $opts) ?: 'bg-jem1';
    $img    = get_field($acf . 'img', $opts) ?: ''; 
    $img_lg = get_field($acf . 'img_lg', $opts) ?: ''; 
}



//post template default override
if ( is_single() && ( $pt == 'post' ) ) {
    // background
    $bg = get_field('hero_bg') ?: $bg;
    if( get_field('hero_bg') == 'bg-img' ) {
        $img    = get_field('hero_img') ?: '';
        $img_lg = get_field('hero_img_lg') ?: '';
    }
    // overlay
    if( get_field('hero_over') == 'true' ) {
        $over   = 1;
        $obg    = get_field('hero_over_bg' ) ?: '';
        $op     = get_field('hero_over_opacity') ? ( get_field('hero_over_opacity') / 100 ) : 0.3;
    }
}

?>
<div class="hero hero-page d-flex flex-column <?php echo $bg .  $al . $ju . $al_lg . $ju_lg .' hero-'.$pt; ?>">
    
    <?php if($bg == 'bg-img'): ?>
        <div class="img-overlay">
            <div class="img-wrap obj">
                <?php 
                    if($img && $img_lg ) {
                        echo wp_get_attachment_image( $img, 'full', '', array('class' => 'd-lg-none', 'role' => 'presentation') );
                        echo wp_get_attachment_image( $img_lg, 'full', '', array('class' => 'd-none d-lg-block', 'role' => 'presentation') );
                    }
                    elseif($img) { 
                        echo wp_get_attachment_image( $img, 'full', '', array('role' => 'presentation') ); 
                    }
                    elseif($img_lg) { 
                        echo wp_get_attachment_image( $img_lg, 'full', '', array('role' => 'presentation') ); 
                    }
                ?>
            </div>
        </div>
    <?php endif; ?>
    <?php 
        if( $over ){ echo '<div class="overlay '.$obg.'" style="opacity: '.$op.';"></div>';  }; // overlay if selected
    ?>
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
            <div class="col-12 d-flex flex-column<?php echo $al . $ju . $al_lg . $ju_lg; ?>">
                <?php get_template_part( 'template-parts/modules/hero/partials/header' ); ?>
            </div>
        </div>
    </div>
</div>

