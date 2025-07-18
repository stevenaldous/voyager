<?php  // Group template for Headline

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( have_rows('block_headline') ): while( have_rows('block_headline') ): the_row(); 

$text = get_sub_field('text');
$vh   = get_sub_field('text_vh') ?: 'headline';


?>
<div class="head-wrap">
    <?php if($text) {  echo '<p class="'.$vh.' text-capitalize"><em>'.$text.'</p></em>'; } ?>
</div>


<?php endwhile; endif; // end of file?>