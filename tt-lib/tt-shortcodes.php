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

add_shortcode( 'mm_feature_image', 'mm_feature_image' );
function mm_feature_image ( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'name' => '',
            'id' => '',
		), $atts )
	);
    
    $feature_img = get_stylesheet_directory_uri();
    $placeholder = get_stylesheet_directory_uri();    
    $mm_title = get_the_title();
    
    $tt_post_content = '<div class="feature-img">
                        <img src="/wp-content/themes/Builder-Air-Math/images/feature.png"/>
                        <h1 class="feature-title">' . $mm_title .'</h1>
                        </div>';
    
// code
return $tt_post_content;    
}

////////////////////////////////////////////////////////