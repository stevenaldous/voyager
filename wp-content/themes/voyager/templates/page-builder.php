<?php /* Template Name: Voyager Page Builder
*
*
*
*/
// Exit if accessed directly.
defined('ABSPATH' ) || exit;

get_header(); 

//template vars
$sb     = get_field('sb') ?: ''; 
$class  = $sb ? 'col-12 col-lg-8' : 'col';  

?>
<div class="page-wrapper" id="page-wrapper">
	<div id="content" tabindex="-1">
        <?php /* hero */ get_template_part('template-parts/components/hero/hero', 'page'); ?>
        <?php // page content ?>
            <main class="site-main mt-5" id="main">
                <div class="container">
                    <div class="row">
                        <div class="<?php echo $class; ?>">
           
                            <?php  get_template_part('template-parts/flex/flex', 'voyager'); // get home flex controller ?>

                        </div>
                        <?php if( $sb ) { get_template_part('/template-parts/components/sidebars/sidebar'); }; ?>
                    </div>
                </div>
            </main>
        <?php // page content ?>

	</div>
</div>

<?php get_footer();