<?php
/**
 * Fotografie Theme Customizer
 *
 * @package Fotografie
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cleanfotografie_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'fotografie_layout_type' )->default = 'fluid';
	$wp_customize->remove_section( 'upgrade_button' );

	$wp_customize->get_setting( 'header_image' )->transport = 'refresh';

	$wp_customize->add_setting( 'cleanfotografie_header_media_title', array(
		'default'			=> esc_html__( 'Header Media', 'clean-fotografie' ),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'cleanfotografie_header_media_title', array(
		'label'		=> esc_html__( 'Header Media Title', 'clean-fotografie' ),
		'section'   => 'header_image',
        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'cleanfotografie_header_media_text', array(
		'default'			=> esc_html__( 'This is Header Media Text.', 'clean-fotografie' ),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'cleanfotografie_header_media_text', array(
		'label'    => esc_html__( 'Header Media Text', 'clean-fotografie' ),
		'section'  => 'header_image',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'cleanfotografie_header_media_button_text', array(
		'default'			=> esc_html__( 'Explore', 'clean-fotografie' ),
		'sanitize_callback' => 'wp_kses_data',
	) );

	$wp_customize->add_control( 'cleanfotografie_header_media_button_text', array(
		'label'		=> esc_html__( 'Header Media Link Text', 'clean-fotografie' ),
		'section'   => 'header_image',
        'type'	  	=> 'url',
	) );

	$wp_customize->add_setting( 'cleanfotografie_header_media_button_url', array(
		'default'			=> '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'cleanfotografie_header_media_button_url', array(
		'label'    => esc_html__( 'Header Media Link URL', 'clean-fotografie' ),
		'section'  => 'header_image',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'cleanfotografie_header_media_button_base', array(
		'sanitize_callback' => 'fotografie_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'cleanfotografie_header_media_button_base', array(
		'label'    	=> esc_html__( 'Check to Open Link in New Window/Tab', 'clean-fotografie' ),
		'section'  	=> 'header_image',
		'type'     	=> 'checkbox',
	) );
}
add_action( 'customize_register', 'cleanfotografie_customize_register', 100 );

if ( ! function_exists( 'cleanfotografie_customize_preview_js' ) ) :
  /**
   * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
   */
  function cleanfotografie_customize_preview_js() {
    wp_enqueue_script( 'cleanfotografie-customize-preview', get_stylesheet_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview' ), '20171219', true );
  }
endif;
add_action( 'customize_preview_init', 'cleanfotografie_customize_preview_js' );