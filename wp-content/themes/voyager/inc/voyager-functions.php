<?php //this sheet holds the WP Functions settings for this project.

//////////////////////////////////////////////////////////////////////////
/// ** underscore functions. **
///////////////////////////////////////////////////////////////////////////
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function voyager_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'voyager_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function voyager_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'voyager_pingback_header' );



//////////////////////////////////////////////////////////////////////////
/// ** Disable Child theme templates from editor **
///////////////////////////////////////////////////////////////////////////
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );
/**
* Remove page templates inherited from the parent theme.
*
* @param array $page_templates List of currently active page templates.
*
* @return array Modified list of page templates.
*/
function child_theme_remove_page_template( $page_templates ) {
    // Remove the template we don’t need.
    unset( $page_templates['page-templates/blank.php'] );
    unset( $page_templates['page-templates/empty.php'] );
    unset( $page_templates['page-templates/both-sidebarspage.php'] );
    unset( $page_templates['page-templates/fullwidthpage.php'] );
    unset( $page_templates['page-templates/left-sidebarpage.php'] );
    unset( $page_templates['page-templates/no-title.php'] );
    unset( $page_templates['page-templates/right-sidebarpage.php'] );
    return $page_templates;
}


//////////////////////////////////////////////////////////////////////////
// ** Rename Default Template **
//////////////////////////////////////////////////////////////////////////
// add_filter('default_page_template_title', function() {
//     return __('WP Default (do not use)', 'your_text_domain');
// });




//////////////////////////////////////////////////////////////////////////
/// ** Main Address Format **
///////////////////////////////////////////////////////////////////////////
function main_address( $style ) {
    $str  = get_field('main_str','options');
    $str2 = get_field('main_str2','options');
    $cit  = get_field('main_city','options');
    $sta  = get_field('main_state','options');
    $zip  = get_field('main_zip','options');

    if( $style == 'inline' ) {
        if( $str2 ) {
            $str2 = $str2 . ', ';
        }
        return  '<address>'.
                    '<p class="mb-0">'.
                        $str.', '. $str2 .
                        $cit.', '.
                        $sta.' '.
                        $zip.
                    '</p>'.
                '</address>';
    } 
    else {
        if( $str2 ) {
            $str2 = '<p class="mb-0">'.$str2.'</p>';
        }
        return  '<address>'.
                    '<p class="mb-0">'.$str.'</p>'.$str2.
                    '<p>'.
                        $cit.', '.
                        $sta.' '.
                        $zip.
                    '</p>'.
                '</address>';
    }
}

//////////////////////////////////////////////////////////////////////////
/// ** CPT: Location Address Format **
///////////////////////////////////////////////////////////////////////////
function loc_address( $style ) {

    $str  = get_field('str');
    $str2 = get_field('str2');
    $cit  = get_field('city');
    $sta  = get_field('state');
    $zip  = get_field('zip');

    if( $style == 'inline' ) {
        if( $str2 ) {
            $str2 = $str2 . ', ';
        }
        return  '<address class="mb-2">'.
                    '<p class="mb-0">'.
                        $str.', '. $str2 .
                        $cit.', '.
                        $sta.' '.
                        $zip.
                    '</p>'.
                '</address>';
    } 
    else {
        if( $str2 ) {
            $str2 = '<p class="mb-0">'.$str2.'</p>';
        }
        return  '<address>'.
                    '<p class="mb-0">'.$str.'</p>'.$str2.
                    '<p class="mb-0">'.
                        $cit.', '.
                        $sta.' '.
                        $zip.
                    '</p>'.
                '</address>';
    }
}

//////////////////////////////////////////////////////////////////////////
/// ** Phone Format **
///////////////////////////////////////////////////////////////////////////
function phone( $ctry, $pho, $style ) {

    $sr = '<span class="sr-only">Call Now at </span>';

    if( $style == 'dots' ) {
        return '<a class="pho" href="tel:+'.$ctry.$pho.'">'.$sr.
        substr($pho, 0, 3 ).
        '.'.
        substr($pho, 3, 3 ).
        '.'.
        substr($pho, 6, 4 ).
        '</a>';
    }
    if( $style == 'dashes' ) {
        return '<a class="pho" href="tel:+'.$ctry.$pho.'">'.$sr.
        substr($pho, 0, 3 ).
        '-'.
        substr($pho, 3, 3 ).
        '-'.
        substr($pho, 6, 4 ).
        '</a>';
    }
    if( $style == 'textDashes' ) {
        return substr($pho, 0, 3 ).'-'.
        substr($pho, 3, 3 ).'-'.
        substr($pho, 6, 4 );
    }
    if( $style == 'textDots' ) {
        return substr($pho, 0, 3 ).'.'.
        substr($pho, 3, 3 ).'.'.
        substr($pho, 6, 4 );
    }
    if( $style == 'text' ) {
        return '('.substr($pho, 0, 3 ).') '.
        substr($pho, 3, 3 ).'-'.
        substr($pho, 6, 4 );
    }
    if( $style == 'btn' ) {
        return '<a class="pho btn btn-primary" href="tel:+'.$ctry.$pho.'"><i class="fa-solid fa-phone-flip" aria-hidden="true"></i>'.$sr.
        substr($pho, 0, 3 ).
        '.'.
        substr($pho, 3, 3 ).
        '.'.
        substr($pho, 6, 4 ).
        '</a>';
    }
    else {
        return '<a class="pho" href="tel:+'.$ctry.$pho.'">'.$sr.'('.
            substr($pho, 0, 3 ).
            ') '.
            substr($pho, 3, 3 ).
            '-'.
            substr($pho, 6, 4 ).
            '</a>';
    }
};

//////////////////////////////////////////////////////////////////////////
/// ** Phone Button **
///////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////
/// ** Email Format **
///////////////////////////////////////////////////////////////////////////
function email( $ema ) {
    return '<a class="ema" href="mailto:'.$ema.'">'.$ema.'</a>';
};

//////////////////////////////////////////////////////////////////////////
/// ** Move Yoast to bottom of editor **
///////////////////////////////////////////////////////////////////////////
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');



//////////////////////////////////////////////////////////////////////////
/// ** Remove COMMENTS in its entirety **
///////////////////////////////////////////////////////////////////////////
// Removes from admin menu
add_action( 'admin_menu', 'voyager_remove_admin_menus' );
function voyager_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

// Removes from post and pages
add_action('init', 'voyager_remove_comment_support', 100);
function voyager_remove_comment_support() {
   remove_post_type_support( 'post', 'comments' );
   remove_post_type_support( 'page', 'comments' );
}

// Removes from admin bar
add_action( 'wp_before_admin_bar_render', 'voyager_remove_comments_admin_bar' );
function voyager_remove_comments_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}




///////////////////////////////////////////////////////////////////////////
/// ** Remove Posts if not needed **
///////////////////////////////////////////////////////////////////////////
if( ! get_field('gcpt_posts', 'options') ) {
    // Remove default Post content type from WordPress

    add_action('admin_menu','remove_posts_type' );
    add_action('admin_bar_menu','remove_posts_from_menu', 9999);
    add_action('wp_dashboard_setup', 'remove_posts_quickdraft', 9999);

    function remove_posts_type() { // Remove post type links
    remove_menu_page('edit.php');
    }
    function remove_posts_quickdraft(){ // Remove "quick drafts" post from dashboard
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); 
    }
    function remove_posts_from_menu( $wp_admin_bar ) { // Remove "New post" links
    $wp_admin_bar->remove_node('new-post');
    }
}


///////////////////////////////////////////////////////////////////////////
/// ** Add animation class to header logo on home page only **
///////////////////////////////////////////////////////////////////////////
add_filter( 'get_custom_logo', 'change_logo_class' );

function change_logo_class( $html ) {
    if( is_front_page() ) {
        $html = str_replace( 'custom-logo-link', 'navbar-brand animate__animated animate__fadeInDown', $html );
    }

    return $html;
}


///////////////////////////////////////////////////////////////////////////
/// ** Map embed **
///////////////////////////////////////////////////////////////////////////
function map_embed() {
    // Load value.
    $iframe = get_field('map_embed', 'options');

    // Use preg_match to find iframe src.
    preg_match('/src="(.+?)"/', $iframe, $matches);

    $src = $matches[1];

    // Add extra parameters to src and replace HTML.
    $params = array(
        // 'controls'  => 0,
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);

    // Add extra attributes to iframe HTML.
    $attributes = 'frameborder="0"';
    $class      = 'class="riddle-map"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . $class .'></iframe>', $iframe);

    // Display customized HTML.
    return $iframe;
}


///////////////////////////////////////////////////////////////////////////
/// ** video embed **
///////////////////////////////////////////////////////////////////////////
function video_embed( $iframe ) {

    // Use preg_match to find iframe src.
    preg_match('/src="(.+?)"/', $iframe, $matches);
    $src = $matches[1];

    // Add extra parameters to src and replace HTML.
    $params = array(
        'controls'  => 0,
        'hd'        => 1,
        'autohide'  => 1,
    );
    $new_src = add_query_arg($params, $src);
    $iframe = str_replace($src, $new_src, $iframe);

    // Add extra attributes to iframe HTML.
    $attributes = 'frameborder="0"';
    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

    return $iframe;
}


// ///////////////////////////////////////////////////////////////////////////
/// ** Update Excerpts **
///////////////////////////////////////////////////////////////////////////

add_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );

if ( ! function_exists( 'understrap_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function understrap_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
            // $url = esc_url( get_permalink( get_the_ID() ) );
            // $rm = '<a></a>';

			$post_excerpt = '<p>'.$post_excerpt . '...</p>';
		}
        
		return $post_excerpt;
	}
}
//////////////////////////////////////////////////////////////////////////
/// ** Read More Excerpt Length **
///////////////////////////////////////////////////////////////////////////
function voyager_excerpt_length( $length ) {
    return 55;
}
add_filter( 'excerpt_length', 'voyager_excerpt_length', 999 );



//////////////////////////////////////////////////////////////////////////
/// ** ACF Menu fill **
///////////////////////////////////////////////////////////////////////////


function acf_load_menu_choices( $field ) {
    
    // Reset choices
    $field['choices'] = array();
    
    $menus = wp_get_nav_menus();

    if ( ! empty( $menus ) ) {

        foreach ( $menus as $menu ) {
             $field['choices'][ $menu->slug ] = $menu->name;
        }

   }

   return $field;
    
}

add_filter('acf/load_field/name=mb_nav_menus', 'acf_load_menu_choices');

//////////////////////////////////////////////////////////////////////////
/// ** Eugene Helper Function **
//////////////////////////////////////////////////////////////////////////
/**
 * Check property inside array.
 * @param {array} $data_arr         - array with properties.
 * @param {string} $key             - property name.
 * @param {string} $default_value   - default value if property doesn't have any value.
 *
 * @return mixed|null
 */
function get_field_value( $data_arr, $key, $default_value = null ): mixed
{
    return ( !empty($data_arr[ $key ]) ) ? $data_arr[ $key ] : $default_value;
}