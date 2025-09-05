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
    $mw_lg   = '';
    $fa  = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';
    $i   = '';
    $bg  = get_field('test_def_bg','options') ?: 'bg-white';
    $th  = get_field('test_def_theme','options') ? ' voy-dark' : ' voy-light';
    $al  = get_field('test_def_align','options') ?: 'center';
    $rnd =  get_field('test_def_round', 'options' ) ? ' rounded' :  '';
    $bor  = get_field( 'test_def_bor', 'options' ) ? ' border ' . get_field( 'test_def_bor', 'options' ) :  '';
    $stars = get_field('stars');
    $vh = 'h5 plus';

    // card text truncate value
    $lim = get_field('test_txt_limit','options') ?: 200;

    $lp  = 0; 
    // check for vars passed into template part
    if( $args ) {
        $mw_lg = array_key_exists('mw_lg', $args) ? ' mw-lg-'.$args['mw_lg'] : $mw_lg;
        $lp    = array_key_exists('lp', $args) ? $args['lp'] : $lp;
    }

    // post vars
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


    $shad    =  is_front_page() || $lp ? '' : ' shadow';

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
<article class="testimonial-card p-4 p-lg-5 h-100 <?php echo $bg . $th . $mw_lg . $rnd . $shad . $bor; ?> ">
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