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
    $t = get_the_title();
    $id = get_the_ID();

    $mbs = 'btn-secondary';
    
    if( $args ) {
      $mbs    = array_key_exists('style', $args) ? $args['style'] : $mbs; 
      $mw_lg  = array_key_exists('mw_lg', $args) ? $args['mw_lg'] : $mw_lg;
    }

    // card text truncate value
    $lim = get_field('test_txt_limit','options') ?: 200;

    // post vars
    $client  = get_field('client');
    $content = get_field('content');
    $shad    =  is_front_page() ? '' : ' shadow';

    // icon options 
    $ict  = get_field('test_icon_type','options');
    if ( $ict == 'fa' ) {
        $ic = get_field('test_icon') ?: 'fa-quotes';
        $i = '<i class="'.$fa.' '.$ic.' fa-3x" aria-hidden="true"></i>';
    }
    if ( $ict == 'img' ) {
        $img = get_field('test_image', 'options');
        $i   = '<img src="'.$img['sizes']['thumbnail'].'" alt="'.$img['alt'].'" />';
    }
?>
<div class="testimonial-modal">
    <!-- Button trigger modal -->
    <button type="button" class="btn <? echo $mbs; ?> w-100 d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#testimodal<?php echo $id; ?>">
        <?php 
            if($client) { echo '<span class="font-hx">' . $client . '</span>'; }
            else { echo '<span class="">' . $t . '</span>'; }

            // print stars if entered
            if($stars) {
                echo '<div class="stars-wrap ms-3">';
                for( $s = 0; $s < $stars; $s++ ) {
                    echo '<i class="fa-solid fa-star me-1 c-review fa-lg"></i>';
                }
                echo '</div>';
            }
        ?>

    </button>
</div>


<!-- Modal -->
<div class="modal fade" id="testimodal<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testimodal<?php echo $id; ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content <?php echo $bg . $th; ?>">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body testimonial-card">
        <div class="tc-inner text-<?php echo $al; ?>">
        
            <?php if($i) { echo '<div class="icon-wrap mb-4">'. $i. '</div>'; } ?>
            
            <p class="modal-title title h4 mb-3" id="testimodal<?php echo $id; ?>Label h3"><?php echo $t; ?></p>
            
            <?php 
                // print stars if entered
                if($stars) {
                  echo '<div class="stars-wrap my-3">';
                  for( $s = 0; $s < $stars; $s++ ) {
                      echo '<i class="fa-solid fa-star me-1 c-review fa-lg"></i>';
                  }
                  echo '</div>';
                }

                if($content){ echo '<div class="text-wrap">' . substr($content,0,$lim) . '</div>'; }

                if($client) { echo '<p class="client mt-4"><strong>- ' . $client . '</strong></p>'; }
            ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>