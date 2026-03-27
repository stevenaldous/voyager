<?php // Flex Template for Voyager content

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container  = get_theme_mod( 'voyager_container_type' ) ?: 'container';

// check for header
$head_tf    = get_sub_field('vcr_head_tf');
$header     = get_sub_field('vcr_header');

// Load spacing/class options
include( locate_template( 'template-parts/flex/flex-options.php', false, false ) );
// btn group/select over ride
$th         = get_sub_field('theme') ?: 'v-light';
$col        = 'col-12';

// gap and order
$gap    = get_sub_field('col_gap') ?  ' gap-xl-'.get_sub_field('col_gap') : '';
$ord    = get_sub_field('col_ord') ?: ' order-2';
$ord_md = get_sub_field('col_ord_md') ? ' '.get_sub_field('col_ord_md') : '';
$ord_lg = get_sub_field('col_ord_lg') ? ' '.get_sub_field('col_ord_lg') : '';
$ord_xl = get_sub_field('col_ord_xl') ? ' '.get_sub_field('col_ord_xl') : '';
$ord    = $ord . $ord_md . $ord_lg . $ord_xl;

// vars
$rep = 'column_rep';
$ct  = get_sub_field( $rep ) ? count( get_sub_field( $rep ) )  : 0;

//get cols
if($ct > 1 ) {
    // col vars
    $col_md = get_sub_field('col_md');
    $col_lg = get_sub_field('col_lg');
    $col_xl = get_sub_field('col_xl');

    // main col widths
    $col1_md = $col_md ? ' col-md-'.get_sub_field('col_md') : '';
    $col1_lg = $col_lg ? ' col-lg-'.get_sub_field('col_lg') : '';
    $col1_xl = $col_xl ? ' col-xl-'.get_sub_field('col_xl') : '';
    $col     = 'col-12' . $col1_md . $col1_lg . $col1_xl;

    // secondary col widths
    $col2_md = $col_md ? ' col-md-'. ( 12 - get_sub_field('col_md') ) : '';
    $col2_lg = $col_lg ? ' col-lg-'.( 12 - get_sub_field('col_lg') ) : '';
    $col2_xl = $col_xl ? ' col-xl-'.( 12 - get_sub_field('col_xl') ) : '';
    $col2     = 'col-12' . $col2_md . $col2_lg . $col2_xl;
}

if(have_rows($rep)):

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

        <?php if( $head_tf ) { get_template_part('template-parts/flex/rows/partials/vcr', 'header', array('header'=>$header)); }  ?>

        <div class="row">

            <?php // check for content and print
                while( have_rows($rep) ): the_row();

                // if second row, use col2 values
                if(get_row_index() == 2 ) {
                    $col = $col2;
                    $ord = '';
                }
                else {
                    //$ord = ' test';
                }

                //content alignment vars
                $alx = get_sub_field('flex_align_x') ? ' align-items-'. get_sub_field('flex_align_x') : ' align-items-start' ;
                $aly = get_sub_field('flex_align_y') ? ' justify-content-'. get_sub_field('flex_align_y') : ' justify-content-center';

                
            ?>
            <div class="<?php  echo $col .' '. $alx . $aly . ' '. $ord; ?> d-flex flex-column">
                <?php get_template_part('template-parts/flex/flex-voyager-content'); ?>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php endif; ?>