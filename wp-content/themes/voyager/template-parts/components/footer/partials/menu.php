<?php
/**
 * The template for displaying the footer menu
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


if( have_rows( 'foot_menus','options' ) ) {
    while( have_rows( 'foot_menus','options' ) ) {
        the_row();

        $t    = get_sub_field('title');
        $vh   = get_sub_field( 'vh' ) ?: 'h4';
        $menu = get_sub_field('mb_nav_menu');

        if($menu){
            echo '<div class="fmenu-wrap mb-4 mb-md-0 me-md-4">'; // open wrapper
        
            // title
            if($t){ echo '<p class="'.$vh.' mb-3">' . $t . '</p>'; }
        
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
    }
} wp_reset_postdata();

?>