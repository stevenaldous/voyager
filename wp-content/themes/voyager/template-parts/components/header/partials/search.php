<?php
/**
 * The template for displaying search forms
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$uid               = wp_unique_id( 's-' ); // The search form specific unique ID for the input.

$aria_label = '';
if ( isset( $args['aria_label'] ) && ! empty( $args['aria_label'] ) ) {
	$aria_label = 'aria-label="' . esc_attr( $args['aria_label'] ) . '"';
}
?>
<div class="search-wrap">
    <form role="search" class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>>
        <label class="screen-reader-text" for="<?php echo $uid; ?>"><?php echo esc_html_x( 'Search for:', 'label', 'understrap' ); ?></label>
        <div class="input-group">
            <input type="search" class="field search-field form-control" id="<?php echo $uid; ?>" name="s" value="<?php the_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'understrap' ); ?>">
            <?php if ( 'bootstrap5' === $bootstrap_version ) : ?>
                <button class="submit search-submit no-btn" type="submit"><i class="fa-regular fa-magnifying-glass" aria-hidden="true"></i></button>
            <?php else : ?>
                <span class="input-group-append">
                    <input type="submit" class="submit search-submit no-btn " name="submit" value="<?php echo esc_attr_x( '<i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>', 'submit button', 'understrap' ); ?>">
                </span>
            <?php endif; ?>
        </div>
    </form>
</div>
