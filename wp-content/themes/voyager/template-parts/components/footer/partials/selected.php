<?php /* a template to handle footer selected content
 */

 // Exit if accessed directly.
 defined( 'ABSPATH' ) || exit;
 
 // template vars
 $sel = get_field('f_con_select','options');
 $t   = get_field('f_con_title', 'options');
 $vh  = get_field('f_con_vh',  'options' ) ?: 'h4';
 $cpt = get_field('f_con_cpt','options');

 // layout vars
 $col = 'col-12 col-lg-4 col-xxl-6 mt-4 mt-lg-0'; // class for selected content column. var for future variable layout usage. 

?>

<div class="<?php echo $col; ?>">
    <?php if($t) { echo '<p class="'.$vh.' mb-3">'.$t.'</p>'; } // print title ?>

    <?php 
        if($sel == 'locations' && $cpt ) {
            
            echo '<div class="row g-4">';
            
            foreach( $cpt as $post ) {
                setup_postdata($post);

                echo '<div class="col-12 col-sm-6 col-lg-12 col-xxl-6">';
                    get_template_part('template-parts/components/cards/card','location-img');
                echo '</div>';
            }

            echo '</div>';

        } wp_reset_postdata();
    ?>
</div>



