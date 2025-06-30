<?php // This template displays available Social Icons inline 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

	$rep   = 'soc_rep';
	$class = 'inline flex-row';

	if( have_rows('soc_rep', 'options') ) {
		echo '<ul class="social mb-0 d-flex '. $class . ' justify-content-center align-items-center">';
		while( have_rows('soc_rep', 'options') ) {
			the_row();

			$soc  = get_sub_field('soc','options');
			$icon = $soc['value'];
			$name = $soc['label'];
			$url  = esc_url(get_sub_field('url','options'));

			if( $soc && $url ) {
				echo '<li><a href="'.$url.'" class="btn-social" target="_blank">'.
				'<i class="fa-brands '.$icon.'" aria-hidden="false"></i><span class="sr-only">Link to '.$name.'</span>'.
				'</a></li>';
			}

		} wp_reset_postdata();
		echo '</ul>';
	} 
    else {
        echo '<h6>Just a little Anti-Social</h6>';
    }
?>