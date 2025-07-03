<?php
/**
 * Hero Partial - Landing Page Form
 *
 * @package Jem
 * 
 * 
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Form style Vars
$bg     = get_field('form_bg') ?: ' bg-white';
$th     = get_field('form_theme')  ? ' jem-dark' : ' jem-light';
$f_btn  = get_field('form_btn') ?: 'form-btn-secondary'  ;
$f_sty  = get_field('form_style') ? ' form-under ' : ' '  ;

// def phone vars
$ctry 	= get_field( 'pho_ctry','options' );
$pho 	= get_field( 'pho','options' );
// lp override
$pho    = get_field( 'phone' ) ?: $pho;
$pho_t  = get_field( 'phone_text' );
$ph_st  = get_field( 'pho_style','options') ?: '';

// form vars
$f_t    = get_field( 'form_title' );
$f_subt = get_field( 'form_subt' );
$f      = get_field( 'form' );

if( is_array( $f ) ) {  // will process stored form if saved in an array. Has catch for if form is stored as object.  
    if( is_array( $f['fields'] ) ) {
        $f =  $f['fields'][0]['formId'];
    }
    else {
        $f =  $f[0];
    }
}
?>

<div class="<?php echo $bg . $th ?> form-wrap p-4 p-lg-5 position-relative">
    <?php if($bg == 'bg-img') { 
        $bg = get_field('form_bg_img');

        $args = array( 'img' => $bg );
        
        get_template_part('template-parts/components/overlay','img', $args); 
        
    } ?>
    <div class="text-center position-relative">
        <?php 
            if( $f_t )    { echo '<h2 class="ft h2">'.$f_t.'</h2>'; }
            if( $f_subt ) { echo '<p class="subt pb-3 mb-3">'.$f_subt.'</p>'; }
            if( $pho ) {
                echo '<a href="tel:+'. $ctry . $pho .'" aria-label="Call Us" class="phone mb-4 d-block">';
                if( $pho_t ) { echo '<span class="me-2">'.$pho_t.'</span>';}
                echo '<i class="fa-regular fa-phone me-2" aria-hidden="true"></i>'. phone($ctry , $pho, 'text_'.$ph_st). '</a>';
            }
            if( $f ) { echo '<div class="form-wrap'.$f_sty.$f_btn.'">'.gravity_form( $f, false, true, false, false, true, false, false ).'</div>'; }
        ?>
    </div>
</div>
