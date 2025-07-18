<?php  // Group template for image

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( have_rows('block_image') ): while( have_rows('block_image') ): the_row(); 

$img = get_sub_field('image');
$rnd = get_sub_field('rounded');


if($img) { 
    echo '<div class="img-wrap align-self-center '.$rnd.'">'
        .wp_get_attachment_image($img, 'full')
    .'</div>'; }

?>


<?php endwhile; endif; // end of file?>