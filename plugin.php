<?php
/*
Plugin Name: Page Template Plugin
Plugin URI: http://github.com/tommcfarlin/page-template-plugin/
Description: An example plugin used to show how to include page templates with your plugin.
Version: 0.1
Author: Tom McFarlin
Author URI: http://tommcfarlin.com/
Author Email: tom@tommcfarlin.com
License:

  Copyright 2013 Tom McFarlin (tom@tommcfarlin.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/

if( ! defined( 'PAGE_TEMPLATE_PLUGIN' ) ) {
	define( 'PAGE_TEMPLATE_PLUGIN', '0.1' );
} // end if

/**
 * @package Page Template Example
 * @version 0.1
 * @since 	0.1
 */
class Page_Template_Plugin {

	/*--------------------------------------------*
	 * Attributes
	 *--------------------------------------------*/

	/** A reference to an instance of this class. **/
	private static $instance;

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	
	/**
	 * Returns an instance of this class. This is the Singleton design pattern.
	 * 
	 * @return OBJECT 	A reference to an instance of this class.
	 */
	public static function getInstance() {

		if( null == self::$instance ) {
			self::$instance = new Page_Template_Plugin();
		} // end if

		return self::$instance;

	} // end getInstance

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 *
	 * @version		1.0
     * @since 		1.0
	 */
	private function __construct() {

		add_action( 'init', array( $this, 'plugin_textdomain' ) );

		register_activation_hook( __FILE__, array( $this, 'register_project_template' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deregister_project_template' ) );
		
	} // end constructor

	/*--------------------------------------------*
	 * Localization
	 *--------------------------------------------*/

	/**
	 * Loads the plugin text domain for translation
	 *
	 * @version		1.0
     * @since 		1.0
	 */
	public function plugin_textdomain() {
		load_plugin_textdomain( 'pte', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
	} // end plugin_textdomain

	/*--------------------------------------------*
	 * Activation and Deactivation Hooks
	 *--------------------------------------------*/

	/**
	 * Copies the template from the `views/templates` directory to the root of the active theme
	 * directory so that it can be applied to pages.
	 *
	 * @verison	1.0
	 * @since	1.0
	 */
	public function register_project_template() {

		// Get the template source and destination for copying from the plugin to the theme directory
		$template_destination = $this->get_template_destination();
		$template_source = $this->get_template_source();

		// Now actually copy the template file from the plugin to the destination
		$this->copy_page_template( $template_source, $template_destination );

	} // end register_project_template
	
	/** 
	 * Removes the template from the theme directory that was added during theme activation.
	 *
	 * @version	1.0
	 * since	1.0
	 */
	public function deregister_project_template() {
		
		// Get the path to the theme
		$theme_dir = get_stylesheet_directory();
		$template_path = $theme_dir . '/template-example.php';
		
		// If the template file is in the theme path, delete it.
		if( file_exists( $template_path ) ) {
			unlink( $template_path );
		} // end if
		
	} // end deregister_project_template

	/*--------------------------------------------*
	 * Helper Methods
	 *--------------------------------------------*/

	/**
	 * @return string The destination to the plugin directory relative to the currently active theme
	 */
	private function get_template_destination() {
		return get_stylesheet_directory() . '/template-example.php';
	} // end get_template_destination

	/**
	 * @return string The path to the template file relative to the plugin.
	 */
	private function get_template_source() {
		return dirname( __FILE__ ) . '/templates/template-example.php';
	} // end get_template_source

	/**
	 * Copies the contents of the template from the source file in the plugin
	 * to the destination in the current theme directory.
	 * 
	 * This works by first creating an empty file, reading the contents of the template file
	 * then writing it into the empty file in the theme directory.
	 *
	 * Note that this version is for demonstration purposes only and does not include proper
	 * exception handling for when file operations fail.
	 * 
	 * @param  string $template_source      The path on which the template resides.
	 * @param  string $template_destination The path to which the template should be written.
	 */
	private function copy_page_template( $template_source, $template_destination ) {

		// After that, check to see if the template already exists. If so don't copy it; otherwise, copy if
		if( ! file_exists( $template_destination ) ) {
			
			// Create an empty version of the file
			touch( $template_destination );
			
			// Read the source file starting from the beginning of the file
			if( null != ( $template_handle = @fopen( $template_source, 'r' ) ) ) {
			
				// Now read the contents of the file into a string. Read up to the length of the source file
				if( null != ( $template_content = fread( $template_handle, filesize( $template_source ) ) ) ) {
				
					// Relinquish the resource
					fclose( $template_handle );
					
				} // end if
				
			} // end if
						
			// Now open the file for reading and writing
			if( null != ( $template_handle = @fopen( $template_destination, 'r+' ) ) ) {
			
				// Attempt to write the contents of the string
				if( null != fwrite( $template_handle, $template_content, strlen( $template_content ) ) ) {
				
					// Relinquish the resource
					fclose( $template_handle );
					
				} // end if

			} // end if
			
		} // end if

	} // end copy_page_template

} // end class

$GLOBALS['ptb'] = Page_Template_Plugin::getInstance();
