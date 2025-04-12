<?php
/**
 * Custom header implementation
 */

function water_sports_club_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'water_sports_club_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 220,
		'wp-head-callback'       => 'water_sports_club_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'water_sports_club_custom_header_setup' );

if ( ! function_exists( 'water_sports_club_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see water_sports_club_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'water_sports_club_header_style' );
function water_sports_club_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
		.page-template-custom-home-page .bottom-header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'water-sports-club-basic-style', $custom_css );
	endif;
}
endif; // water_sports_club_header_style