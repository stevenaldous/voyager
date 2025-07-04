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


    $lay    = get_field('hero_layout') ?: false;
    $bar    = ($lay == 'bar') && get_field( 'hero_bar_style' ) ? ' bar-'.get_field( 'hero_bar_style' ) : '';

    // template Vars
    $bg     = get_field( 'hero_bg' ) ?:  'bg-img'; 
    $img    = get_field( 'hero_img' ) ?: false;
    $img_lg = get_field( 'hero_img_lg' ) ?: false;
    $img_op = get_field( 'hero_img_opt' ) ?: false;
    $img_al = get_field( 'img_opt_align' ) ? 'img-start' : 'img-end';
    $order  = get_field( 'img_opt_order' ) ?: false;
    $over   = get_field( 'hero_over') ?: false;

    // horiz align vars
    $ju    = get_field('hero_just')  ? ' justify-content-' . get_field('hero_just') : ' justify-content-center';
    $ju_lg = get_field('hero_just_lg') ? ' justify-content-md-' . get_field('hero_just_lg') : ' justify-content-md-center';

    // vert align vars
    $al    = get_field('hero_align') ? ' align-items-' . get_field('hero_align') : ' align-items-center';
    $al_lg = get_field('hero_align_lg') ? ' align-items-md-' . get_field('hero_align_lg') : ' align-items-md-center';

    //Home Hero Popup TF
    $pop  = get_field('hero_buttons') == 'pop' ? true : false;

?>
<div class="hero hero-home d-grid <?php echo $bg . $al . $al_lg .' home-'.$lay . $bar; ?>">
    <?php // bg image or overlay
        if( $bg == 'bg-img' ){
            echo '<div class="img-overlay"><div class="img-wrap obj">';
                if($img && $img_lg ) {
                    echo wp_get_attachment_image( $img, 'full', '', array('class' => 'd-lg-none', 'role' => 'presentation') );
                    echo wp_get_attachment_image( $img_lg, 'full', '', array('class' => 'd-none d-lg-block', 'role' => 'presentation') );
                }
                elseif($img) { 
                    echo wp_get_attachment_image( $img, 'full', '', array('role' => 'presentation') ); 
                }
            echo '</div></div>';
        } 
        if( $over ){ 
            $obg = get_field( 'hero_over_bg' ) ?: 'bg-dark';
            $op  = get_field('hero_over_opacity') ? ( get_field('hero_over_opacity') / 100 ) : 0.3;
            echo '<div class="overlay '.$obg.'" style="opacity: '.$op.';"></div>'; 
        };
    ?>
<div class="<?php echo esc_attr( $container ); ?>">
    <div class="row hero-text">
        <div class="col-12 d-flex <?php echo $ju . $ju_lg; ?> position-relative hero-pad">
            <?php get_template_part( 'template-parts/components/hero/partials/header-home' ); ?>
        </div>
    </div>
</div>
    <?php if( $img_op ): ?>
        <div class="hh-img-wrap <?php echo $img_al; ?>">
            <div class="img-wrap obj">
                <?php echo wp_get_attachment_image($img_op, 'full'); ?>
            </div>
        </div>
    <?php endif; ?>

</div>

<?php 
    // print optional hero content
    if( $lay == 'bar' ) { get_template_part('template-parts/components/hero/partials/bar'); } // feature bar
?> 
<?php if( $pop == true) { get_template_part('template-parts/components/modals/modal-hh'); } ?>