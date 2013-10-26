<?php
/**
 * Template Name: Example Page Template II
 *
 * The second template used to demonstrate how to include the template
 * using this plugin.
 *
 * @package PTE
 * @since 	1.0.0
 * @version	1.0.0
 */
?>

<?php

	$pte = Page_Template_Plugin::get_instance();
	$locale = $pte->get_locale();

?>
<h1><?php _e( 'This is another example template.', $locale ); ?></h1>