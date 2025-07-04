<?php
/**
 * The template for displaying the footer copyright text
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//site-info vars
$copyr 	= get_field('copyr', 'options');
$links	= get_field('copy_rep', 'options');

?>

<p class="copyr">&copy; <?php echo date("Y") . ' ' . $copyr; ?></p>
<?php if( $links ): ?>
    <div class="si-links">
        <?php foreach( $links as $row ): 
            // get link array
            $link = $row['link'];

            if( $link ):
                // get link vars
                $lu = $link['url'];
                $lt = $link['title'];
                $lx = $link['target'] ? $link['target'] : '_self';
        ?>
            <a href="<?php echo esc_url( $lu ); ?>" target="<?php echo esc_attr( $lx ); ?>"><?php echo esc_html( $lt ); ?></a>
        <?php endif; endforeach; ?>
    </div>
<?php endif; ?>