<?php //////////////////////////////////////////////////////////////////////
/// ** ACF Options **
///////////////////////////////////////////////////////////////////////////
//Add ACF site Options page
if( function_exists('acf_add_options_page') ) {
    // Main Jem Options Page // Site Settings & Content > Main Site Settings & Content
    acf_add_options_page(array(
        'page_title'    => 'Main Site Settings & Content',
        'menu_title'    => 'Site Settings & Content',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    // Sidebar Options Page // Site Settings & Content > Sidebars
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Sidebars',
    //     'menu_title'    => 'Sidebars',
    //     'parent_slug'   => 'theme-general-settings',
    // ));

    // // Social Options Page // Site Settings & Content > Social Accounts
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Social Accounts',
    //     'menu_title'    => 'Social Accounts',
    //     'parent_slug'   => 'theme-general-settings',
    // ));

    // SEO Settings
    acf_add_options_sub_page(array(
        'page_title'    => 'CPT Settings',
        'menu_title'    => 'CPT Settings',
        'parent_slug'   => 'theme-general-settings',
    ));

    // Color/Font Control Panel
    acf_add_options_sub_page(array(
        'page_title'    => 'Colors & Fonts',
        'menu_title'    => 'Colors & Fonts',
        'parent_slug'   => 'theme-general-settings',
    ));
    // // Blog Options Page // Posts > 
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Blog Page',
    //     'menu_title'    => 'Blog Page',
    //     'parent_slug'   => 'edit.php',
    // ));

    // Service Area Options
    acf_add_options_sub_page(array(
        'page_title'    => 'Service Area Settings',
        'menu_title'    => 'Service Area Settings',
        'parent_slug'   => 'edit.php?post_type=services',
    ));

    // Team Options
    acf_add_options_sub_page(array(
        'page_title'    => 'Team Settings',
        'menu_title'    => 'Team Settings',
        'parent_slug'   => 'edit.php?post_type=team',
    ));

    // Badges Options
     acf_add_options_sub_page(array(
        'page_title'    => 'Badges Settings',
        'menu_title'    => 'Badges Settings',
        'parent_slug'   => 'edit.php?post_type=badges',
    ));

    // Testimonials Options
    acf_add_options_sub_page(array(
        'page_title'    => 'Testimonials Settings',
        'menu_title'    => 'Testimonials Settings',
        'parent_slug'   => 'edit.php?post_type=testimonials',
    ));

};


function remove_acf_options_page() {
	global $user_ID;

	if ( current_user_can( 'editor' ) ) {
   		remove_menu_page('theme-general-settings');		
	}
}
add_action('admin_menu', 'remove_acf_options_page', 99);

//////////////////////////////////////////////////////////////////////////
// ** Edit TinyMCE editor to limit options and improve ADA compliance  **
//////////////////////////////////////////////////////////////////////////
add_filter('tiny_mce_before_init', 'tiny_mce_cph' );

function tiny_mce_cph($init) {
    // Add block format elements you want to show in dropdown
    $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;';

    return $init;
}

//////////////////////////////////////////////////////////////////////////
// ** Remove some content fields  ** DISABLED
//////////////////////////////////////////////////////////////////////////
// add_filter('acf/prepare_field/type=flexible_content', 'voyager_flexible_content_layouts');

function voyager_flexible_content_layouts($field){
    // Bail early if no layouts
    if(!isset($field['layouts']) || empty($field['layouts']))
        return $field;
    
    foreach($field['layouts'] as $layout_key => $layout){
        if( /*  CPTs managed by theme settings  */
            $layout['name'] === 'cpt_team' && ! get_field('gcpt_team', 'options')
            || $layout['name'] === 'cpt_location' && ! get_field('gcpt_locations', 'options')
            // || $layout['name'] === 'cpt_practices' && ! get_field('gcpt_practices', 'options')
            // || $layout['name'] === 'cpt_testimonials' && ! get_field('gcpt_testimonials', 'options')
            || $layout['name'] === 'cpt_cases' && ! get_field('gcpt_cases', 'options')
            || $layout['name'] === 'cpt_faqs' && ! get_field('gcpt_faqs', 'options')
            || $layout['name'] === 'cpt_awards' && ! get_field('gcpt_awards', 'options')
            
            /*  Blueprint Layout Always leave this here  */
            || $layout['name'] === 'blueprint' 
        ){
            // Disable
            unset($field['layouts'][$layout_key]);  
        }
    }
    // return
    return $field;
}

// Adjust startdate default value
add_filter('acf/load_field/name=startdate', function ($field) {
    $field['default_value'] = date('m/d/Y');
    return $field;
});


/**
 * ACF Populate Select Field with Menus
 * @link https://www.advancedcustomfields.com/resources/acf-load_field/
 * @link https://www.advancedcustomfields.com/resources/dynamically-populate-a-select-fields-choices/
 *
 * Dynamically populates any ACF field with voy_nav_menu with list of navigation menus
 *
*/
add_filter( 'acf/load_field/name=voy_nav_menu', 'wd_nav_menus_load' );
function wd_nav_menus_load( $field ) {

     $menus = wp_get_nav_menus();

     if ( ! empty( $menus ) ) {

          foreach ( $menus as $menu ) {
               $field['choices'][ $menu->slug ] = $menu->name;
          }

     }

     return $field;

}