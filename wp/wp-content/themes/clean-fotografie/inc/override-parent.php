<?php
/**
 * Override parent functions
 *
 * @package Clean Fotografie
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * overwriting parent theme content width
 */
function fotografie_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fotografie_content_width', 1000 );
}

/**
 * Set up the WordPress core custom header feature.
 *
 * Overwriting parent theme custom header
 */
function fotografie_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'fotografie_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri() . '/assets/images/header.jpg',
		'default-text-color' => 'ffffff',
		'width'              => 1920,
		'height'             => 1080,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'fotografie_header_style',
		'video'              => true,
	) ) );

	register_default_headers( array(
		'blond' => array(
			'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/header-thumb.jpg',
			'url'           => get_stylesheet_directory_uri() . '/assets/images/header.jpg',
			'description'   => esc_html__( 'Blond', 'clean-fotografie' ),
		),
		'closeup' => array(
			'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/images/header2-thumb.jpg',
			'url'           => get_stylesheet_directory_uri() . '/assets/images/header2.jpg',
			'description'   => esc_html__( 'Closeup', 'clean-fotografie' ),
		),
	) );
}

/**
 * Register Google fonts for Clean Fotografie.
 *
 * Overwriting fotografie_fonts_url() function in a child theme.
 */
function fotografie_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'clean-fotografie' ) ) {
		$fonts[] = 'Raleway:300,400,700,300italic,400italic,700italic';
	}

	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Source Serif Pro font: on or off', 'clean-fotografie' ) ) {
		$fonts[] = 'Source Serif Pro:300,400,700,300italic,400italic,700italic';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url( $fonts_url );
}
