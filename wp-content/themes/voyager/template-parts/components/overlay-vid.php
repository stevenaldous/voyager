<?php /* template to handle all video overlays
*
*
*
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


// vid var
$vid    = get_field( 'bg_video' ) ?: '';

if( $args ) {
    $vid    = array_key_exists('vid', $args) ? $args['vid']  : $vid; 
}

if($vid) {
    echo '<div class="video-overlay abs-cover">' . video_bg($vid ). '</div>';
}

?>
