<?php // This template displays the HTML Sitemap

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>
<h2 class="h4" >Pages</h2>
<ul>
<?php
//get and set page exclusions from SEO settings
$exclude = get_field('sitemap_exclude', 'options') ;
$exc = $exclude ? implode(',' , $exclude ) : '';
// list pages
wp_list_pages( array( 
  'exclude' => $exc,
  'title_li' => '',
) ); ?>
</ul>

<?php 
// CPT list for loop. (check inc/cpt.php for current cpt list  )
$voyager_cpts = array(
    'team',
    'services',
    // 'testimonials',
    // 'faqs',
    // 'awards',
    // 'resources',
    // 'videos',
    // 'lp',
);

foreach ( $voyager_cpts as $cpt ) {
    if( get_field('gcpt_' . $cpt , 'option') ) {

        $args = array (
            'post_type' => $cpt,
        );
        $posts = new WP_Query($args);
        if($posts->have_posts()) {
            $postType = get_post_type_object($cpt);
            if ($postType) {
                echo '<h2 class="h4">'.esc_html($postType->labels->singular_name). '</h2>';
            }
            echo '<ul>';
            while($posts->have_posts()) {
                $posts->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>'; 
            }
            echo '</ul>';
        }
    }
}
?>

<h2 class="h2">Posts</h2>
<?php 
$cats = get_categories('exclude=');
foreach ($cats as $cat) {
  echo '<h3 class="h4">' . $cat->cat_name . '</h3>';
  echo '<ul>';
  query_posts('posts_per_page=-1&cat=' . $cat->cat_ID);
  while(have_posts()) {
    the_post();
    $category = get_the_category();
    if ($category[0]->cat_ID == $cat->cat_ID) {
      echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>'; 
    }
  }
  echo '</ul>';
}
?>