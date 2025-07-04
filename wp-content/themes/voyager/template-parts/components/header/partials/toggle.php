<?php
/**
 * The template for displaying the Navbar Toggler
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
 
// get font awesome weight
$fa  = get_field('fa_def','options') ? 'fa-'.get_field('fa_def','options') : 'fa-light';

// vars
$btn_st = get_field('nav_tog_style','options') ?: 'btn-secondary';
$icon   = get_field('nav_tog_icon','options') ?: 'fa-align-left';

?>
<button class="navbar-toggler ms-3 d-lg-none btn <?php echo $btn_st; ?>" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
    <i class="<?php echo $fa .' '.$icon; ?>"></i>
</button>
