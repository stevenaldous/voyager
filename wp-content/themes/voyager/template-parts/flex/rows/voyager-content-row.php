<?php // Flex Template for Voyager content

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container = get_theme_mod( 'understrap_container_type' ) ?: 'container';

// Load spacing/class options
include( locate_template( 'template-parts/flex/flex-options.php', false, false ) );
// btn group/select over ride
$th   = get_sub_field('theme') ?: 'v-light';

// col widths
$col_md = get_sub_field('col_md') ? ' col-md-'.get_sub_field('col_md') : '';
$col_lg = get_sub_field('col_lg') ? ' col-lg-'.get_sub_field('col_lg') : '';
$col_xl = get_sub_field('col_xl') ? ' col-xl-'.get_sub_field('col_xl') : '';
$col    = 'col-12' . $col_md . $col_lg . $col_xl;
// gap and order
$gap    = get_sub_field('col_gap') ?  ' gap-xl-'.get_sub_field('col_gap') : '';
$ord    = get_sub_field('col_ord') ?: ' order-2';
$ord_xl = get_sub_field('col_ord_xl') ? ' '.get_sub_field('col_ord_xl') : '';
$ord    = $ord .$ord_xl;

// vars
$rep = 'column_rep';
$ct  = get_sub_field( $rep ) ? count( get_sub_field( $rep ) )  : 0;


?>
<div class="flex-voy-content <?php echo  $bg . ' ' . $th . $pt . $pb ;?> py-5 position-relative">
    <?php 
        if( $bg == 'bg-img' ) {
            // get vars to pass to template
            $img    = get_sub_field( 'bg_img' ) ?: '';
            $img_lg = get_sub_field( 'bg_img_lg' ) ?: '';
            
            get_template_part('template-parts/components/overlay', 'img', array( 'img' => $img, 'img_lg' => $img_lg ));
        }
    ?>
    <div class="<?php echo esc_attr( $container ) . $pt . $pb ; ?> ">
        <div class="row">
            <?php // check for content and print
                while( have_rows($rep) ): the_row(); 

                $alx = get_sub_field('flex_align_x') ? ' align-items-'. get_sub_field('flex_align_x') : ' align-items-start' ;
                $aly = get_sub_field('flex_align_y') ? ' justify-content-'. get_sub_field('flex_align_y') : ' justify-content-center';


                $o = '';
            ?>

            <div class="col-12 col-md-6 <?php  echo $alx . $aly; ?> d-flex flex-column">
                <?php get_template_part('template-parts/flex/flex-voyager-content'); ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>