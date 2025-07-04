<?php
/**
 * Hero Partial - Team info
 *
 * @package Voyager
 * 
 * 
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$email  = get_field('email');
$ctry 	= get_field('pho_ctry','options');
$phone 	= get_field('pho','options');
$phone  = get_field('pho') ?: $phone;
$ph_st  = get_field('pho_style','options') ?: '';
$li_l   = get_field('li_url');
$vcf    = get_field('vcf');
$loc    = get_field('loc');

?>


<div class= "d-flex flex-column align-items-start justify-content-start mt-4">
<?php 
    if( $loc ) {
        foreach( $loc as $post ) {
            setup_postdata($post);

            echo '<div class="info-wrap add"><i class="fa-fw fa-regular fa-building pe-2" aria-hidden="true"></i>'.
            loc_address( '' ) .'</div>';

        } wp_reset_postdata();
    }
    // phone
    if($phone) { echo '<div class="info-wrap phone"><i class="fa-fw fa-regular fa-phone pe-2" aria-hidden="true"></i>'. phone( $ctry, $phone, $ph_st ) . '</div>'; };

    // email
    if($email) { echo '<div class="info-wrap email"><i class="fa-fw fa-regular fa-envelope pe-2" aria-hidden="true"></i>'. email( $email ) . '</div>'; };

    // linkedin link and logo
    if($li_l) { 
        echo '<div class="info-wrap email"><i class="fa-fw fa-brands fa-linkedin-in pe-2" aria-hidden="true"></i>'. 
        '<a href="'.esc_url($li_l).'" target="_blank">LinkedIn</a>' . 
        '</div>'; 
    };
    // .vcf contact card
    if($vcf) { 
        echo '<div class="info-wrap vcf"><i class="fa-fw fa-regular fa-address-card pe-2" aria-hidden="true"></i>' 
        . '<a href= "' . $vcf . '" target="_blank"> Download Contact Info</a>' . '</div>'; 
    };
?>
</div>