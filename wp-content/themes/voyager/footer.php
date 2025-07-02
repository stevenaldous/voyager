<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$foot = get_field( 'foot_template','options') ?: 'main';
$bg   = get_field( 'foot_bg','options') ?: 'bg-v1';
$th   = get_field('foot_theme') ?: 'v-dark';

?>
	<div id="wrapper-footer">
		<footer class="site-footer" id="colophon">
			<?php 
				if( is_page_template( 'page-templates/contact.php' ) || is_404() ||  is_page_template( 'page-templates/thanks.php' ) ) {
					get_template_part( 'template-parts/components/footer/footer', 'contact' );
				}
				else {
					echo '<div class="footer-main footer '.$bg.' '.$th.'">';
						get_template_part( 'template-parts/components/footer/footer', $foot );
					echo '</div>';
				}
			?>
		</footer>
	</div><?php // wrapper end ?>

</div><?php // #page we need this extra closing tag here ?>

<?php // check for page Javascript

	// Global JS
	if(have_rows('gjs_rep','options')) {
		while(have_rows('gjs_rep','options')) {
			the_row();
			if( get_sub_field('loc') === 'foot') {
				// set dates to check for expiration of script
				$now = new DateTime( date('m/d/Y') );
				$exp = new DateTime( get_sub_field('expdate') );
				$gjs = get_sub_field('js');
				if( $exp ) { if( $exp > $now ) { echo $gjs; } }
				else { echo $gjs; }	
			}
		}	
	}
?>

<?php wp_footer(); ?>
</body>
</html>
