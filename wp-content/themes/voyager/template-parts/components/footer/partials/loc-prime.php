<?php
/**
 * The template for displaying the footer location and logo
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Main footer vars
wp_reset_postdata();

$t     = get_field('f_con_title', 'options');
$vh    = get_field('f_con_vh', 'options' ) ?: 'h4';
$loc   = get_field('f_loc_prime', 'options');

if($t){ echo '<p class="'.$vh.' mb-3">' . $t . '</p>'; }

if($loc) {
    echo '<div class="loc-prime">';

    foreach($loc as $post) {

        setup_postdata($post);

        $t = get_the_title();

        echo '<p class="font-lg font-hx mb-0">'.$t.'</p>';
        echo loc_address('block');

    } wp_reset_postdata();

    echo '</div>';
}

?>

<?php // print buttons if selected
 // get buttons
 get_template_part('template-parts/components/button','group', array('rep' => 'foot_rep','opt'=>'options'));
?>