<?php
/**
 * Single Testimonial Card
 *
 * @package Voyager
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

    // styling vars from parent field groups (CMS)
    $mw_lg      = '';
    $al         = 'center';
    $fa         = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';
    $i          = '';
    $stars      = get_field('stars');
    $vh         = 'h5 plus';

    // card text truncate value
    $lim = get_field('test_txt_limit','options') ?: 200;

    // Load spacing/class options
    include( locate_template( 'template-parts/components/cards/card-settings.php', false, false ) );
    
    // check for vars passed into template part
    if( $args ) {
        $mw_lg = array_key_exists('mw_lg', $args) ? ' mw-lg-'.$args['mw_lg'] : $mw_lg;
    }


    // content vars
    $t       = get_the_title();
    $client  = get_field('client');
    $content = get_field('content');

    // read more link
    $rm     =  get_field('test_rm_link', 'options') ?: '';

    if($rm) {
        $u = $rm['url'];
        $t = $rm['title'];

        $rm = '&#8288;... <a href="'.$u.'">'.$t.'</a>';
    }
    else {
        $rm = '&#8288;...';
    }

    if( is_page_template('page-templates/cpt-archive.php') ) {
        $content = $content;
    }
    else { 
        $content = '<p>'.trim( strip_tags( substr($content,0,$lim) ) ) . $rm .'</p>'; 
    }

    // icon options 
    $ict  = get_field('test_icon_type','options');
    if ( $ict == 'fa' ) {
        $ic = get_field('test_icon', 'options') ?: 'fa-quotes';
        $i = '<i class="'.$fa.' '.$ic.' fa-3x" aria-hidden="true"></i>';
    }
    elseif ( $ict == 'img' ) {
        $img = get_field('test_image', 'options');
        $i   = '<img src="'.$img['sizes']['medium'].'" alt="'.$img['alt'].'" />';
    }
?>
<article class="testimonial-card p-4 p-lg-5 h-100 <?php echo $card_style . $mw_lg; ?> ">
    <div class="tc-inner text-<?php echo $al; ?>">
        <?php 
            // card icon/image
            if($i) { echo '<div class="icon-wrap mb-4">'. $i. '</div>'; } 
            
            // card title
            echo '<p class="title '.$vh.'">'.$t.'</p>';

            // print stars if entered
            if($stars) {
                echo '<div class="stars-wrap my-3">';
                for( $s = 0; $s < $stars; $s++ ) {
                    echo '<i class="fa-solid fa-star me-2 c-review fa-lg"></i>';
                }
                echo '</div>';
            }
            // review text
            if($content){ echo '<div class="text-wrap">' . $content . '</div>'; }
            // client name
            if($client) { echo '<p class="client mt-4 font-hx"><strong>- ' . $client . '</strong></p>'; }
        ?>
    </div>
</article>