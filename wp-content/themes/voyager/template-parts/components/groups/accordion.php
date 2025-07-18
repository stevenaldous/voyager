<?php  // Group template for accordions
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if( have_rows('block_accordion') ): while( have_rows('block_accordion') ): the_row(); 

$rep = 'group_rep';
$acc_id = rand( 1, 50000 ); // accordion ID

// Accordion styles
$bg     = get_sub_field('bg_color') ?: 'bg-white';
$th     = get_sub_field('theme') ?: 'v-light';
$rnd    = get_sub_field('rounded') ?: '';
$bo     = get_sub_field('border') ? get_sub_field('border') .' border border-3 ': '';
$tog    = get_sub_field('acc_tog') ?: 'acc-plus';
$sh     = get_sub_field('title_sh') ?: 'h3';
$vh     = get_sub_field('title_vh') ?: 'h5';

if( have_rows($rep) ):

?>
<div class="w-100 accordion-wrap <?php echo $bg.' '.$th.' '.$rnd.' '.$bo; ?>">
    <div class="accordion <?php echo $tog; ?>" id="accordion<?php echo $acc_id; ?>">
    <?php 
            while( have_rows($rep) ):
                the_row();
                $ri     = get_row_index();
                $t      = get_sub_field('title');
                $text   = get_sub_field('text');
        ?>
            <div class="accordion-item">
                <?php echo '<'.$sh.' class="accordion-header '.$vh.'" id="acc-head'.$acc_id.$ri.'">'; ?>
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $acc_id.$ri ?>" aria-expanded="false" aria-controls="collapse<?php echo $acc_id.$ri ?>">
                        <?php echo $t  ?>
                    </button>
                <?php echo '</'.$sh.'>'; ?>
                <div id="collapse<?php echo $acc_id.$ri ?>" class="accordion-collapse collapse" aria-labelledby="acc-head<?php echo $acc_id.$ri; ?>" data-bs-parent="#accordion<?php echo $acc_id; ?>">
                    <div class="accordion-body">
                        <?php if( $text ) { echo '<div class="a text-wrap">'.$text.'</div>'; } ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php endif; endwhile; endif; // end of file?>