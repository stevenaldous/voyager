<?php
/**
* Plugin Name: Voyager Core Plugin
* Plugin URI: https://stevenaldous.com/
* Description: This plugin holds the vital bits of Voyager. Custom Post type, shortcodes, etc. 
* Version: 1.0
* Author: Steven Aldous
* Author URI: https://stevenaldous.com/
**/


/**
 * The filesystem path of the directory that contains the plugin, includes trailing slash.
 *
 * @since 2.6.2
 *
 * @var string
 */
define( 'VOYAGER_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The name of the plugin extracted from its path.
 *
 * @since 2.7
 *
 * @var string
 */
define( 'VOYAGER_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );


require_once VOYAGER_PLUGIN_DIR_PATH . 'inc/voyager-functions.php';
require_once VOYAGER_PLUGIN_DIR_PATH . 'inc/cpt.php';
require_once VOYAGER_PLUGIN_DIR_PATH . 'inc/shortcodes.php';