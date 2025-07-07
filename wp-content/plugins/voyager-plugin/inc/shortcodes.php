<?php //this sheet holds the shortcodes settings for this project.

//////////////////////////////////////////////////////////////////////////
/// ** SITEMAP **
///////////////////////////////////////////////////////////////////////////

function get_sitemap($atts) {	
    ob_start();
    include VOYAGER_PLUGIN_DIR_PATH . '/template-parts/sitemap.php';
    return ob_get_clean();
  }
  add_shortcode('sitemap', 'get_sitemap');
  