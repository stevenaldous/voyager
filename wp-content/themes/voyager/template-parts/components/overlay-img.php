<?php /* template to handle all img overlays
*
*
*
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$img    = get_field( 'bg_img' ) ?: '';
$img_md = get_field( 'bg_img_md' ) ?: '';
$img_lg = get_field( 'bg_img_lg') ?: '';

if( $args ) {
    $img    = array_key_exists('img', $args) ? $args['img'] : $img; 
    $img_md = array_key_exists('img_md', $args) ? $args['img_md'] : '';
    $img_lg = array_key_exists('img_lg', $args) ? $args['img_lg'] : '';
}

?>
<div class="img-overlay">
    <div class="img-wrap obj">
    <?php
        if($img && $img_md && $img_lg ) {
            echo wp_get_attachment_image( $img, 'full', '', array('class' => 'd-md-none', 'role' => 'presentation') );
            echo wp_get_attachment_image( $img_md, 'full', '', array('class' => 'd-none d-md-block d-xl-none', 'role' => 'presentation') );
            echo wp_get_attachment_image( $img_lg, 'full', '', array('class' => 'd-none d-xl-block', 'role' => 'presentation') );
        }
        elseif($img && $img_lg ) {
            echo wp_get_attachment_image( $img, 'full', '', array('class' => 'd-lg-none', 'role' => 'presentation') );
            echo wp_get_attachment_image( $img_lg, 'full', '', array('class' => 'd-none d-lg-block', 'role' => 'presentation') );
        }
        elseif($img) { 
            echo wp_get_attachment_image( $img, 'full', '', array('role' => 'presentation') ); 
        }
        elseif($img_lg) { 
            echo wp_get_attachment_image( $img_lg, 'full', '', array('role' => 'presentation') ); 
        }
    ?>
    </div>
</div>
