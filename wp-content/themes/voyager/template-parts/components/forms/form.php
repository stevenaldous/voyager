<?php /* Basic Form template
*
*
*
*/
// Exit if accessed directly.
defined('ABSPATH' ) || exit;

$acf = 'form_';
$opt = 'options';

//form vars
$form   = get_field( $acf.'form', $opt );
$f_btn  = get_field( $acf.'btn', $opt) ?: 'form-btn-secondary'  ;
$f_sty  = get_field( $acf.'style', $opt) ? ' form-under ' : ' '  ;
// form vars
$f_th  = get_field('form_theme') ? ' v-dark' : ' v-light';
$f_bg  = get_field('form_bg') ?: 'bg-blur';
$f_rd  = get_field('form_rnd') ? ' rounded-3' : '';
$f_btn = get_field('form_btn') ?: 'form-btn-secondary';
$f_sty = get_field('form_style') ? ' form-under ' : ' ';
?>
<div class="form-wrap <?php echo $f_sty.$f_btn; ?>">
    <?php
        if($t)    { echo '<h2 class="text-'.$al . ' ' .$vh.' mb-4">'.$t.'</h2>'; }
        if($form) { echo  do_shortcode('[ws_form id="'.$form.'"]'); } 
    ?>
</div>