<?php  // Template for optional Flex section Header

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$header = get_sub_field('vcr_header');

// load header passed via get_template_part
if( $args ) {
    $header = array_key_exists('header', $args) ? $args['header'] : '';
}

if($header):

//layout/options vars
$align  = ' text-' . $header['title_align'];
$st     = $header['title_style'] ? ' flair' : '';

// content Vars
$t      = $header['title'];
$sh     = $header['title_sh'] ?: 'h2';
$vh     = $header['title_vh'] ?: 'h2';

?>
    <div class="row">
        <div class="col-12 pb-4 <?php echo $align; ?>">
            <?php echo '<' . $sh . ' class="' . $vh . $st .'">' . $t . '</' . $sh . '>'; ?> 
        </div>
    </div>
<?php endif; ?>