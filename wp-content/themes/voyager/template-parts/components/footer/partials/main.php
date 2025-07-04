<?php
/**
 * The template for displaying the footer location and logo
 *
 * @package Jem
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Main footer vars
$t      = get_field('foot_title','options' );
$vh     = get_field('foot_vh','options' ) ?: 'h4';
$text   = get_field('foot_text','options');
$tf_pho = get_field('foot_tf_pho','options');
$tf_add = get_field('foot_tf_add','options');
$ph_st  = get_field('pho_style','options') ?: '';
$murl   = get_field('foot_tf_add','options');

if($t)    { echo '<h2 class="' .$vh.' mb-4 mt-2">'.$t.'</h2>'; }
// if text, print out
if($text) { echo '<p class="mb-3">'.$text.'</p>'; }

?>

<?php if( $tf_pho == 1 ): // print phone if selected
    $ctry 	= get_field('pho_ctry','options');
    $pho 	= get_field('pho','options');
?>
    <div class="pho-wrap">
        <i class="fa-regular fa-mobile me-1 " aria-hidden="true"></i>
        <?php echo phone( $ctry, $pho, $ph_st ); ?>
    </div>
<?php endif; ?>

<?php if( $tf_add == 1 ):  // print address if selected ?>
    <div class="add-wrap mt-2 d-flex justify-content-center justify-content-md-start align-items-start">
        <i class="fa-regular fa-location-dot me-2 mt-1" aria-hidden="true"></i>
        <?php echo main_address('inline'); ?>
    </div>
<?php endif; ?>

<?php // print buttons if selected
 get_template_part('template-parts/components/button','group', array('rep' => 'foot_rep','opt'=>'options'));
?>