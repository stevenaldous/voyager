<?php  // Group template for Slider

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( have_rows('block_slider') ): while( have_rows('block_slider') ): the_row(); 

$rep    = 'group_rep';
$sl_id  = rand( 1, 50000 ); // slider ID
$fa     = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';

// slide style vars
$bg     = get_sub_field('bg_color') ?: 'bg-white';
$th     = get_sub_field('theme') ?: 'v-light';
$rnd    = get_sub_field('rounded') ?: '';
$bo     = get_sub_field('border') ? get_sub_field('border') .' border border-3 ': '';

$slide_args = array(
    'bg'    => $bg,
    'th'    => $th,
    'rnd'   => $rnd,
    'bo'    => $bo,
    'fa'    => $fa,
);

// slider vars
$pp_sm = get_sub_field('pp_sm') ?: 1;
$pp_md = get_sub_field('pp_md') ?: 2;
$pp_lg = get_sub_field('pp_lg') ?: 1;
$pp_xl = get_sub_field('pp_xl') ?: 2;

if( have_rows($rep) ):
?>
    
<div class="slider-wrap slides-fh">   
    <div id="slider<?php echo $sl_id; ?>" class="">
        <?php 
            while( have_rows($rep) ):
                the_row();

                echo '<div class="px-2">';
                    get_template_part('template-parts/components/cards/card', 'slider-icon', $slide_args );
                echo '</div>'
        ?>
            
                        
            
        <?php endwhile; ?>
    </div>
    <div class="slick-controls controls-<?php echo $sl_id; ?> mt-3 mx-auto"></div>
</div>

<script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#slider<?php echo $sl_id; ?>').slick({
                dots: true,
                infinite: true,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 5000,
                appendDots: '.controls-<?php echo $sl_id; ?>',
                appendArrows: '.controls-<?php echo $sl_id; ?>',
                prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style=""><i class="<?php echo $fa; ?> fa-chevron-left" aria-hidden="true"></i><span class="sr-only">See Previous Slides</span></button>',
                nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style=""><i class="<?php echo $fa; ?> fa-chevron-right" aria-hidden="true"></i><span class="sr-only">See Next Slides</span></button>',
                slidesToShow: <?php echo $pp_xl; ?>,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1500,
                        settings: {
                            slidesToShow: <?php echo $pp_lg; ?>,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: <?php echo $pp_md; ?>,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: <?php echo $pp_sm; ?>,
                            slidesToScroll: 1,
                        }
                    }
                ],
            });
        });
</script>

<?php endif; endwhile; endif; // end of file?>

