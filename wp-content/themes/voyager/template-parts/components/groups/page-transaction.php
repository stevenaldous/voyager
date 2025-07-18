<?php  // Group template Transaction Page

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$group  = 'page_trans';
$opt    = '';

if( is_404() ) {
    $group  = 'page_404';
    $opt    = 'options';
}


if( have_rows( $group, $opt ) ): while( have_rows( $group, $opt ) ): the_row(); 

// style vars
$th     = get_sub_field('theme') ? ' ' . get_sub_field('theme') : ' v-light';
$bg     = get_sub_field( 'bg') ?: 'bg-trans';
$cbg    = get_sub_field( 'bg_color') ?: 'bg-white';

// title vars
$t      = get_sub_field('title'); 
$vh     = get_sub_field('title_vh') ?: 'h2';
$sh     = 'h2';
// text vars
$text   = get_sub_field('text'); 
// img vars
$img    = get_sub_field('img');
// img vars
$rep    = 'card_rep';

?>
<div class="group-trans <?php echo $bg . $th;  ?> position-relative">
    <?php 
        if( $bg == 'bg-img' ) {
            // get vars to pass to template
            $bg_img    = get_sub_field( 'bg_img' ) ?: '';
            $bg_img_md = get_sub_field( 'bg_img_md' ) ?: '';
            $bg_img_lg = get_sub_field( 'bg_img_lg' ) ?: '';
            
            get_template_part('template-parts/components/overlay', 'img', array( 'img' => $bg_img, 'img_md' => $bg_img_md, 'img_lg' => $bg_img_lg ));
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="trans-wrap <?php echo $cbg . $th; ?> rounded-3 w-100">
                    <div class="copy-wrap text-center">
                        <?php
                            if($img)    { echo '<div class="img-wrap rounded-3">'.wp_get_attachment_image($img,'full').'</div>';}
                            if($t)      { echo '<'.$sh.' class="'.$vh.' title">'.$t.'</'.$sh.'>'; }
                            if($text)   { echo '<div class="text-wrap">'.$text.'</div>'; }
                        ?>
                    </div>
                    <?php
                        if( have_rows( $rep ) ) {
                            echo '<div class="card-wrap">';
                            while( have_rows( $rep ) ) {
                                the_row();

                                get_template_part('template-parts/components/cards/card-transactions');
                            }
                            echo '</div>';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; endif; // end of file?>
