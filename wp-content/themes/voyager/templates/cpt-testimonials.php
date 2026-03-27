<?php /* Template Name: Testimonials CPT Page 
*
*
*
*/
// Exit if accessed directly.
defined('ABSPATH' ) || exit;

get_header(); 


// get site container width
$container = get_theme_mod( 'voyager_container_type' ) ?: 'container';

// style vars
$th     = get_field('theme') ? ' v-dark' : ' v-light';
$img    = get_field('bg_img' );
$img_lg = get_field('bg_img_lg');

// template vars
$t 	    = get_field('title') ? get_field('title') : get_bloginfo( 'name' );
$text   = get_field('text');
$cta    = get_field('cta');




?>
<div class="page-wrapper" id="contact-wrapper">
	<div id="content" tabindex="-1">
        <main class="site-main" id="main">
            <?php //top section ?>
            <div class="py-5 ">

                <div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
                        <?php // Text Col  ?>
                        <header class="col-12 col-md d-flex flex-column align-items-start justify-content-center <?php echo $th; ?>">
                            <?php 
                                if($t) { echo '<h1>'.$t.'</h1>';} 
                                if($text) { echo '<div class="text-wrap">'.$text.'</div>';} 
                                if($cta) { echo '<p class="cta large mt-3">'.$cta.'</p>';} 

                                get_template_part('template-parts/components/biz-info');
                            ?>
                        
                            <div class="social-wrap d-flex justify-content-start mt-3">
                                <?php get_template_part('template-parts/components/social'); ?>
                            </div>
                        </header>

                        <?php // Form Col  ?>
                        <div class="col pt-4 p-md-5">
                            <div class="form-wrap p-4 p-lg-5 <?php echo $f_bg . $f_th . $f_sty . $f_rd ; ?> shadow">
                                <?php if($form) { echo  do_shortcode('[ws_form id="'.$form.'" class="'.$f_btn.'"]'); }  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php //end top section ?>

            <?php if($mtf): ?>
                <div class="map-wrap">
                    <div class="container-fluid">
                        <?php // map row  ?>
                        <div class="row">
                            <?php // start of map wrap ?>
                            <div class="col px-0">
                                <div class="ratio ratio-contact ">
                                    <?php echo map_embed(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php  get_footer(); ?>