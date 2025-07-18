<?php  // Partial - Voyager Content Flex text group
//
// this template renders the home copy/text block for most sections 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get site container width
$container = get_theme_mod( 'understrap_container_type' ) ?: 'container';

// content Vars
$sh     = get_sub_field( 'sem_hx' ) ? get_sub_field( 'sem_hx' ) : 'h2';
$vh     = get_sub_field( 'title_vh' ) ? get_sub_field( 'title_vh' ) : 'h2';
$t      = get_sub_field( 'title' );
$subt   = get_sub_field( 'subt' );
$text   = get_sub_field( 'text' );
$subtxt = get_sub_field( 'subtxt' );

// layout vars
$al     = get_sub_field( 'text_align' ) ?: 'start';
$col    = get_sub_field( 'main_md_lay' ) ? get_sub_field( 'main_md_lay' ) .' col-lg-12' : '';

$btns   = array( 'class' => 'flex-column flex-md-r ow justify-content-'.$al.' align-items-'.$al.' align-items-md-center', );

?>

<div class="row text-<?php echo $al; ?>">
    <div class="col-12 <?php echo $col; ?>">
        <?php
        // print title w/options
            if($t) { echo '<' . $sh . ' class="'.$vh.'">' . $t . '</' . $sh . '>'; }


            // print Subtitle if present
            if($subt) { echo '<p class="subt mt-4 ">'. $subt . '</p>'; };
        ?>
    </div>
    <div class="col-12 col-md">
        <?php
            // check for and print text content.  
            if( $text ) { 
                if($text != strip_tags($text)) {
                    echo '<div class="text-wrap mt-3 mt-xl-4 mb-4">'.$text.'</div>';
                }
                else {
                    echo '<div class="text-wrap mt-3 mt-xl-4 mb-4"><p>'.$text.'</p></div>';
                }
            }
                


            // get buttons
            get_template_part('template-parts/components/button','group', $btns);
        ?>
    </div>
</div>