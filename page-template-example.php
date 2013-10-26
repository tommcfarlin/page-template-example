<?php
/**
 * Page Template Example
 *
 * An example WordPress plugin used to show how to include templates with your
 * plugins and programmatically add them to the active theme
 *
 * @package   PTE
 * @author    Tom McFarlin <tom@tommcfarlin.com?
 * @license   GPL-2.0+
 * @link      https://github.com/tommcfarlin/page-template-example
 * @copyright 2013 Tom McFarlin
 *
 * @wordpress-plugin
 * Plugin Name:       Page Template Example
 * Plugin URI:        https://github.com/tommcfarlin/page-template-example
 * Description:       An example WordPress plugin used to show how to include templates with your plugins and programmatically add them to the active theme
 * Version:           1.0.0
 * Author:            Tom McFarlin
 * Author URI:        http://tommcfarlin.com
 * Text Domain:       pte-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/tommcfarlin/page-template-example/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} // end if

require_once( plugin_dir_path( __FILE__ ) . 'class-page-template-example.php' );
add_action( 'plugins_loaded', array( 'Page_Template_Plugin', 'get_instance' ) );