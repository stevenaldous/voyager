<?php
/**
 * The template for displaying the Header Logo
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$url = home_url( '/' );

?>

<!-- Your site title as branding in the menu -->
<?php if ( ! has_custom_logo() ) { ?>

<?php if ( is_front_page() && is_home() ) : ?>

    <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( $url ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

<?php else : ?>

    <a class="navbar-brand" rel="home" href="<?php echo esc_url( $url ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

<?php endif; ?>

<?php
} else {

    $name    = get_bloginfo( 'name' );

    $logo   = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' ) ?: '';    
    // $logo_l = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' ) ?: '';    

    echo '<a href="'.esc_url( $url ).'" class="navbar-brand animate__animated animate__fadeInDown" rel="home" aria-current="page">';

    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . $name . '" class="img-fluid logo-dark" decoding="async">';

    echo '</a>';
}
?>
<!-- end custom logo -->