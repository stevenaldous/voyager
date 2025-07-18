<?php  // Group template for Slider

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( have_rows('block_cards') ): while( have_rows('block_cards') ): the_row(); 

$rep    = 'group_rep';
$fa     = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';

// slide style vars
$bg     = get_sub_field('bg_color') ?: 'bg-white';
$th     = get_sub_field('theme') ?: 'v-light';
$rnd    = get_sub_field('rounded') ?: '';
$bo     = get_sub_field('border') ? ' '.get_sub_field('border') .' border border-3 ': '';

if( have_rows($rep) ):
?>
    
<div class="card-group d-grid">   
    <?php 
        while( have_rows($rep) ):
        the_row();
        $i      = get_sub_field('icon');
        $text   = get_sub_field('text');
     ?>
 
        <div class="card-simple <?php echo $bg .' '.$th.' '.$rnd . $bo; ?>">
                <?php
                    if($i)    { echo '<div class="icon-wrap c-accent"><i class="'.$fa.' '.$i.'" aria-hidden="true"></i></div>';}
                    if($text) { echo '<p>'.$text.'</p>';}
                ?>
        </div>

    <?php endwhile; ?>
</div>

<?php endif; endwhile; endif; // end of file?>