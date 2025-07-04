<?php
/**
 * The template Displays the Footer Flex Column - Menu
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$menu = get_field( 'mb_nav_menu', 'options' );

if($menu){
    echo '<div class="fmenu-wrap mb-4">'; // open wrapper
    // menu
    wp_nav_menu(
        array(
            'theme_location'  => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'nav menu foot-menu flex-column',
            'fallback_cb'     => '',
            'menu'            => $menu,
            'depth'           => 1,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        )
    );
    echo '</div>'; // open wrapper

}