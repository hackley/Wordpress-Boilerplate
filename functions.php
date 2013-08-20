<?php 

	// Stylesheets
	function theme_styles() {
		wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );		
	}

	add_action( 'wp_enqueue_scripts', 'theme_styles' );

	// Enable custom menues
	add_theme_support( 'menus' );

?>