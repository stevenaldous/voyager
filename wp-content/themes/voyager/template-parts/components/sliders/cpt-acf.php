<?php // Partial for Team Slider - ACF controlled

// ACF relationship
$cpt   = get_sub_field('cpt_cpt');
$card  = $cpt;
$posts = get_sub_field( 'cpt_'.$cpt );
$sl_id = rand( 1, 50000 ); // slider ID
$fa    = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';

// check for card color settings
$args = array(
    'bg' => get_sub_field('bg_color'),
    'th' => get_sub_field('theme'), 
    'bo' => get_sub_field('border'), 
    'bw' => get_sub_field('border-w'), 
    'rd' => get_sub_field('rounded'), 
    'sh' => get_sub_field('shadow'), 
);


// set slider defaults by post type
$pp_sm = 1;
$pp_md = 1;
$pp_lg = 2;
$pp_xl = 2;

if($cpt == 'team') {
    $pp_sm = 1;
    $pp_md = 3;
    $pp_lg = 5;
    $pp_xl = 7;
}

// change number of slides if selected
$pp_sm = get_sub_field('pp_sm') ?: $pp_sm;
$pp_md = get_sub_field('pp_md') ?: $pp_md;
$pp_lg = get_sub_field('pp_lg') ?: $pp_lg;
$pp_xl = get_sub_field('pp_xl') ?: $pp_xl;

if($posts):

?>

<div class="slider-wrap slides-fh">   
    <div class="slick-controls <?php echo $cpt.'-controls'.$sl_id; ?> mt-3 mx-auto"></div>
    <div id="<?php echo $cpt . $sl_id; ?>" class="">
        <?php // loop through all selected CPT posts
            foreach ( $posts as $post ) {
                setup_postdata($post );
                echo '<div class="px-2">';           
                    get_template_part('template-parts/components/cards/card', $card, $args);
                echo '</div>';
            } wp_reset_postdata();    
        ?>
    </div>
    
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#<?php echo $cpt . $sl_id ?>').slick({
                dots: true,
                infinite: true,
                speed: 500,
                autoplay: true,
                autoplaySpeed: 5000,
                // centerMode: true,
                // centerPadding: '100px',
                appendDots: '.<?php echo $cpt.'-controls'.$sl_id; ?>',
                appendArrows: '.<?php echo $cpt.'-controls'.$sl_id; ?>',
                prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style=""><i class="<?php echo $fa; ?> fa-arrow-left" aria-hidden="true"></i><span class="sr-only">See Previous Slides</span></button>',
                nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style=""><i class="<?php echo $fa; ?> fa-arrow-right" aria-hidden="true"></i><span class="sr-only">See Next Slides</span></button>',
                slidesToShow: <?php echo $pp_xl; ?>,
                slidesToScroll: <?php echo $pp_xl; ?>,
                responsive: [
                    {
                        breakpoint: 1500,
                        settings: {
                            slidesToShow: <?php echo $pp_lg; ?>,
                            slidesToScroll: <?php echo $pp_lg; ?>,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: <?php echo $pp_md; ?>,
                            slidesToScroll: <?php echo $pp_md; ?>,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: <?php echo $pp_sm; ?>,
                            slidesToScroll: <?php echo $pp_sm; ?>,
                        }
                    }
                ],
            });	
        });
    </script>
</div>

<?php endif; ?>