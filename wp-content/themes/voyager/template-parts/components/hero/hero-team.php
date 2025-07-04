<?php
/**
 * Hero - Team
 *
 * @package Voyager
 * 
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container = get_theme_mod( 'understrap_container_type' ) ?: 'container-jem';

//Over Lay vars - Theme Default
$over   = get_field('hero_over','options');
$obg    = get_field('hero_over_bg','options' ) ?: 'bg-dark';
$op     = get_field('hero_over_opacity','options') ? ( get_field('hero_over_opacity','options') / 100 ) : 0.3;

// background vars - Theme Default
$bg     = get_field('hero_bg', 'options') ?: 'bg-jem1';
$bgi    = get_field('hero_img','options');
$bgi_lg = get_field('hero_img_lg','options');
$th     = get_field('hero_theme','options') ? ' jem-dark' : ' jem-light';

//Over Lay vars - Team Settings
if( get_field('team_h_over','options') ) {
    $over   = get_field('team_h_over','options') == 'true' ? true : false;
    $obg    = get_field('team_h_over_bg','options' ) ?: $obg;
    $op     = get_field('team_h_over_opacity','options') ? ( get_field('team_h_over_opacity','options') / 100 ) : $op;
}

// background vars - Team Settings
if( get_field('team_h_bg','options') ) {
    $bg     = get_field('team_h_bg', 'options') ?: $bg;
    $bgi    = get_field('team_h_img','options');
    $bgi_lg = get_field('team_h_img_lg','options');
}
$th     = get_field('team_h_theme','options') ?: $th;

// template Vars
$sh     = get_field( 'sem_hx' ) ? get_field( 'sem_hx' ) : 'h1';
$vh     = get_field( 'vis_hx' ) ? get_field( 'vis_hx' ) : 'h1';
$t      = get_field( 'title' ) ? get_field( 'title' ) : get_the_title();
$pos    = get_field( 'pos' );
$img    = get_field( 'image');


?>
<div class="hero hero-team <?php echo $th . ' ' . $bg . ' ' . $over; ?>">
    <?php if($bg == 'bg-img'): ?>
            <div class="img-overlay">
                <div class="img-wrap obj">
                    <?php 
                        if($bgi && $bgi_lg ) {
                            echo wp_get_attachment_image( $bgi, 'full', '', array('class' => 'd-lg-none', 'role' => 'presentation') );
                            echo wp_get_attachment_image( $bgi_lg, 'full', '', array('class' => 'd-none d-lg-block', 'role' => 'presentation') );
                        }
                        elseif($bgi) { 
                            echo wp_get_attachment_image( $bgi, 'full', '', array('role' => 'presentation') ); 
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
            <div class="col-12 px-4 pt-4 px-md-3 pt-md-0">
                <header class="row justify-content-md-between">
                    <div class= "col-12 col-md-5 col-lg-7  order-md-1 ps-md-4 ps-xl-5 py-4 py-lg-5 d-flex flex-column justify-content-center animate__animated animate__fadeInDown ">
                        <div class="text-wrap text-start w-100">
                            <?php // print title w/options
                                echo '<' . $sh . ' class= "' . $vh . '">' . $t . '</' . $sh . '>'; 

                                // positions
                                if($pos) { echo '<p class="pos">'.$pos.'</p>'; } 
                            
                                // print team member info if present    
                                get_template_part('template-parts/modules/hero/partials/team-info');
                            ?>
                        </div>
                    </div>
                    <?php if($img): ?>
                        <div class="team-img col-12 col-md-7 col-lg-5 order-md-0 pt-md-4 animate__animated animate__fadeInLeft ">
                            <div class="ratio ratio-team">
                                <?php // team picture ?>
                                <div class="ratio-inner">
                                    <div class="img-wrap obj single-team-img">
                                        <?php echo wp_get_attachment_image( $img , 'full' ); ?>
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                    <?php endif; ?>
                </header>
            </div>
        </div>
    </div>
</div>

