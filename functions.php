<?php

// Tell the main theme that a child theme is running. Do not remove this.
$GLOBALS['builder_child_theme_loaded'] = true;

// Load translations
load_theme_textdomain( 'it-l10n-Builder-Air', get_stylesheet_directory() . '/lang' );


// Theme Support Features
add_theme_support( 'builder-3.0' );
add_theme_support( 'builder-responsive' );
add_theme_support( 'builder-full-width-modules' );
add_theme_support( 'post-formats', array( 'image', 'quote', 'status', 'video' ) );


// Enqueuing and Using Custom Javascript/Jquery
function it_air_load_custom_scripts() {
if ( file_exists( get_stylesheet_directory() . '/js/it_air_jquery_additions.js' ) )
    $url = get_stylesheet_directory_uri() . '/js/it_air_jquery_additions.js';
else if ( file_exists( get_template_directory() . '/js/it_air_jquery_additions.js' ) )
    $url = get_template_directory_uri() . '/js/it_air_jquery_additions.js';
if ( ! empty( $url ) )
    wp_enqueue_script( 'it_air_jquery_additions', $url, array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'it_air_load_custom_scripts' );


// Tag Cloud Widget functionality
function it_custom_tag_cloud_widget($args) {
	$args['number'] = 0; // adding a 0 will display all tags
	$args['largest'] = 22; // largest tag
	$args['smallest'] = 12; // smallest tag
	$args['unit'] = 'px'; // tag font unit
	$args['format'] = 'flat';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'it_custom_tag_cloud_widget' );


// Add Support for Alternate Module Styles
if ( ! function_exists( 'it_builder_loaded' ) ) {
	function it_builder_loaded() {
		builder_register_module_style( 'navigation', 'Mobile Navigation', 'mobile-nav' );
		builder_register_module_style( 'image', 'No Spacing', 'image-no-spacing' );
		builder_register_module_style( 'image', 'Full Window', 'image-full-window' );
		builder_register_module_style( 'header', 'Inset', 'header-inset' );
		builder_register_module_style( 'navigation', 'Inset', 'navigation-inset' );
		builder_register_module_style( 'content', 'Inset', 'content-inset' );
		builder_register_module_style( 'image', 'Inset', 'image-inset' );
		builder_register_module_style( 'html', 'Inset', 'html-inset' );
		builder_register_module_style( 'widget-bar', 'Inset', 'widget-bar-inset' );
                builder_register_module_style( 'widget-bar', 'orange box', 'orange-box' );
	  builder_register_module_style( 'widget-bar', 'red box', 'red-box' );
  builder_register_module_style( 'widget-bar', 'red box 2', 'red-box-2' );
		builder_register_module_style( 'footer', 'Inset', 'footer-inset' );
	}
}
add_action( 'it_libraries_loaded', 'it_builder_loaded' );


// registering post thumbnail sizes
if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'index-thumbnail', 0, 0, true );
}


// filter out Builder extensions except those provided by the theme
function _it_air_set_extensions_directory( $directories ) {
	$directories = array(
		get_template_directory() . '/extensions',
		get_stylesheet_directory() . '/extensions',
	);

	$directories = array_unique( $directories );

	return $directories;
}
add_filter( 'builder_get_extension_directories', '_it_air_set_extensions_directory' );