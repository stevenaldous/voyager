<?php
/**
 * The template for displaying the footer location and logo
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// get customizer foot logo
$logo_m  = get_theme_mod('footer_mobile_logo');
$logo    = get_theme_mod('footer_logo');

$name    = get_bloginfo( 'name' );

$url = home_url( '/' );

if( get_post_type() == 'lp' ) {
    $url = get_field('lp_logo_url') ?: $url;
}
?>
<div class="foot-logo-wrap">
    <a class="navbar-brand" rel="home" href="<?php echo esc_url( $url ); ?>" itemprop="url">
        <?php if( $logo && $logo_m ) { 
                if( $logo ) { echo '<img class="foot-logo d-lg-none" src="'. esc_url( $logo_m ) .' " alt="'.  $name .' " />'; }; 
                if( $logo_m ) { echo '<img class="foot-logo d-none d-lg-block" src="'. esc_url( $logo ) .' " alt="'.  $name .' " />'; }; 
            }
            elseif( $logo || $logo_m ){
                if( $logo ) { echo '<img class="foot-logo" src="'. esc_url( $logo ) .' " alt="'.  $name .' " />'; }; 
                if( $logo_m ) { echo '<img class="foot-logo" src="'. esc_url( $logo_m ) .' " alt="'.  $name .' " />'; }; 
            }      
            else { 
                bloginfo( 'name' ); 
            }  
        ?>
    </a>
</div>