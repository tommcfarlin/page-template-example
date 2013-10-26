<?php
/**
 * Template Name: Example Page Template
 *
 * The template used to demonstrate how to include
 *
 * @package PTE
 * @since 	1.0.0
 * @version	1.0.0
 */
?>

<?php

	$pte = Page_Template_Example::get_instance();
	$locale = $pte->get_locale();

?>
<h1><?php _e( 'This is an example template.', $locale ); ?></h1>