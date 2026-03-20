<?php /* The template for displaying Page Background Images.
*
*
*
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$img    = get_field( 'body_img', 'options') ?: '';
$img_md = get_field( 'body_img_md', 'options') ?: '';
$img_lg = get_field( 'body_img_lg', 'options') ?: '';

if( get_field('page_bg') ) {
    $img    = get_field( 'page_bg_img' ) ?: '';
    $img_md = get_field( 'page_bg_img_md' ) ?: '';
    $img_lg = get_field( 'page_bg_img_lg') ?: '';
}


?>
<div class="bg-img-fixed">
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