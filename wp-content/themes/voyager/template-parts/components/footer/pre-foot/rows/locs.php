<?php
/**
 * The template for displaying the awards and cases before the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$posts  = get_sub_field('cta_posts');

?>

<?php /*** Locs  ***/ ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-0"> 
            <?php 
                if($posts) {
                    echo '<div class="loc-grid">';
                    foreach($posts as $post) {
                        get_template_part('template-parts/components/cards/card', 'loc');
                    }
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>