<?php

/**
 * This plugin allows you to include templates with your plugin so that they can
 * be added with any theme.
 *
 * @package Page Template Example
 * @version 1.0.0
 * @since 	0.1
 */
class Page_Template_Plugin {

	/*--------------------------------------------*
	 * Attributes
	 *--------------------------------------------*/

    /**
     * Plugin version, used for cache-busting of style and script file references.
     *
     * @since   1.0.0
     *
     * @var     string
     */
    const VERSION = '1.0.0';

    /**
     * Unique identifier for the plugin.
     *
     * The variable name is used as the text domain when internationalizing strings
     * of text.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $plugin_slug;

	/**
	 * A reference to an instance of this class.
	 *
	 * @since 0.0.1
	 *
	 * @var   Page_Template_Plugin
	 */
	private static $instance;

	/**
	 * The array of templates that this plugin tracks.
	 *
	 * @var      array
	 */
	protected $templates;


	/**
	 * Returns an instance of this class. An implementation of the singleton design pattern.
	 *
	 * @return   Page_Templae_Example    A reference to an instance of this class.
	 * @since    1.0.0
	 */
	public static function get_instance() {

		if( null == self::$instance ) {
			self::$instance = new Page_Template_Plugin();
		} // end if

		return self::$instance;

	} // end getInstance

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 *
	 * @version		1.0.0
     * @since 		1.0.0
	 */
	private function __construct() {

		$this->templates = array();
		$this->plugin_locale = 'pte';

		// Grab the translations for the plugin
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Add a filter to the page attributes metabox to inject our template into the page template cache.
		add_filter('page_attributes_dropdown_pages_args', array( $this, 'register_project_templates' ) );

		// Add a filter to the save post in order to inject out template into the page cache
		add_filter('wp_insert_post_data', array( $this, 'register_project_templates' ) );

		// Add a filter to the template include in order to determine if the page has our template assigned and return it's path
		add_filter('template_include', array( $this, 'view_project_template') );

		// Add your templates to this array.
		$this->templates = array(
			'template-example.php'     => __( 'Example Page Template', $this->plugin_slug ),
			'template-example-two.php' => __( 'Example Page Template II', $this->plugin_slug )
		);


	} // end constructor

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain() {

	    $domain = $this->plugin_slug;
	    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

	    load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
	    load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

    } // end load_plugin_textdomain

	/**
	 * Adds our template to the pages cache in order to trick WordPress/
	 * in thinking its a real file.
	 *
	 * @verison	1.0.0
	 * @since	1.0.0
	 */
	public function register_project_templates( $atts ) {

		// create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// retrieve the cache list. if none exist, prepare an empty array.
		$templates = wp_cache_get( $cache_key, 'themes' );
		if ( empty( $templates ) ) {
			$templates = array();
		} // end if

		// remove the old cache
		wp_cache_delete( $cache_key , 'themes');

		// add our template to the templates list.
		$templates = array_merge( $templates, $this->templates );

		// add the modified cache to allow wordpress to pick it up for listing availble templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	} // end register_project_templates

	/**
	 * Checks if the template is assigned to the page
	 *
	 * @version	1.0.0
	 * @since	1.0.0
	 */
	public function view_project_template( $template ) {

		global $post;

		if ( ! isset( $this->templates[ get_post_meta( $post->ID, '_wp_page_template', true ) ] ) ) {
			return $template;
		} // end if

		$file = plugin_dir_path( __FILE__ ) . 'templates/' . get_post_meta( $post->ID, '_wp_page_template', true );

		// Just to be safe, we check if the file exist first
		if( file_exists( $file ) ) {
			return $file;
		} // end if

		return $template;

	} // end view_project_template


	/**
	 * Retrieves and returns the slug of this plugin. This function should be called on an instance
	 * of the plugin outside of this class.
	 *
	 * @return  string    The plugin's slug used in the locale.
	 * @version	1.0.0
	 * @since	1.0.0
	 */
	public function get_locale() {
		return $this->plugin_slug;
	} // end get_locale

} // end class