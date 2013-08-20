<?php 

	// Stylesheets
	function theme_styles() {

		wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );	
			
	}
	add_action( 'wp_enqueue_scripts', 'theme_styles' );



	// Javascripts
	function theme_js() {

		// only used on home page, dependant on jQuery
		wp_register_script( 'main()', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );
		if( is_page( 'home')) {
			wp_enqueue_script( 'main' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'theme_js' );



	// Enable custom menues
	add_theme_support( 'menus' );

?>