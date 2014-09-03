<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////// 2020 Shortcodes


//////////////////////////////////////////////////////// TT Post Content

add_shortcode( 'post_info', 'post_info' );
function post_info ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
            'id' => '',
		), $atts )
	);
    
    $tt_post_content = get_post_field( 'post_content', $id );
    
// code
return $tt_post_content;    
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// MM Logo

add_shortcode( 'mm_logo', 'mm_logo' );
function mm_logo ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
            'id' => '',
		), $atts )
	);
    
    $home = bloginfo('url');
    $logo = bloginfo( 'stylesheet_directory' ) . '/images/logo.png';
    
    $tt_post_content = '<a href="' . $home . '"><img src="' . $logo . '" alt="Home" style="PADDING-LEFT: 20px"/></a>';
    
// code
return $tt_post_content;    
}

////////////////////////////////////////////////////////