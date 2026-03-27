<?php /* Testimonial Archive Layout
*
*/
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

    $cpt = $args['cpt'];
    
    // global $wp_query;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $ppp   =  get_field( 'ppp' ) ?: 12;

    // archive page settings
    if( is_archive() ) {
        // page content
        $ppp    = get_field($cpt.'_ppp', 'options') ?: $ppp;
    }

    // archive display
    // query args
    $args = array(
        'post_type'         => $cpt,
        'posts_per_page'    => $ppp,
        'post_status'    => 'publish',
        'paged' => $paged,
    );

    // check for card color settings
    $acf = 'test_def';
    $opt = 'options';
    $args = array(
        'bg' => get_field($acf.'bg', $opt),
        'th' => get_field($acf.'theme', $opt), 
        'bo' => get_field($acf.'border', $opt), 
        'bw' => get_field($acf.'border-w', $opt), 
        'rd' => get_field($acf.'rounded', $opt), 
        'sh' => get_field($acf.'shadow', $opt), 
    );


    $cpt_query = new WP_Query( $args );

    if( $cpt_query->have_posts() ){

        echo '<div class="row g-5 mb-4">';

        while( $cpt_query->have_posts() ) { $cpt_query->the_post();
            echo '<div class="col-12">';

                get_template_part('template-parts/components/cards/card', $cpt, $args);

            echo '</div>';
        }  
        echo '</div>';
        
        echo '<div class="col-12 my-4">';
            voyager_pagination([ 'total' => $cpt_query->max_num_pages ]);
        echo '</div>';
    } wp_reset_postdata();
?>

