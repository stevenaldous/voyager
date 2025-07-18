<?php  // Group template for Video

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( have_rows('block_video') ): while( have_rows('block_video') ): the_row(); 

// style vars
$rnd = get_sub_field('rounded');
$bo  = get_sub_field('border') ? ' border border-3 '. get_sub_field('border')  : '';
$rat = get_sub_field('ratio') ?: ' ratio-16x9';

// video vars
$vid = get_sub_field('video');


if( get_sub_field('video_type') == 1 ) {
    $cpt_id = get_sub_field('video_cpt');
    $vid    = get_field('vid', $cpt_id);
}

?>
<div class="vid-wrap ratio <?php echo $rat. ' '.$rnd.$bo.$rat; ?>">
    <?php if($vid) { echo video_embed($vid); } ?>
</div>

<?php endwhile; endif; // end of file?>