<?php
/**
 * The template for displaying the footer form
 *
 * @package Voyager
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$acf = 'f_form_';
$opt = 'options';

// text vars
$t      = get_field( $acf.'t', $opt );
$vh     = get_field( $acf.'vh', $opt ) ?: 'h4';
$al     = get_field( $acf.'align', $opt ) ?: 'center' ;
//form vars
$form   = get_field( $acf.'form', $opt );
$f_btn  = get_field( $acf.'btn', $opt) ?: 'form-btn-secondary'  ;
$f_sty  = get_field( $acf.'style', $opt) ? ' form-under ' : ' '  ;

?>
<div class="form-wrap <?php echo $f_sty.$f_btn; ?>">
    <?php
        if($t)    { echo '<h2 class="text-'.$al . ' ' .$vh.' mb-4">'.$t.'</h2>'; }
        if($form) { echo gravity_form( $form, false, true, false, false, true, false, false ); } 
    ?>
</div>