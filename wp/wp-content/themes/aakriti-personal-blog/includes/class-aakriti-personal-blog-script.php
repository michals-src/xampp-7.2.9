<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Aakriti_Personal_Blog_Script {
	
	function __construct() {

		// Action to add style in front end
		add_action( 'wp_enqueue_scripts', array($this, 'aakriti_personal_blog_front_styles'), 1 );

		// Action to add script in front end
		add_action( 'wp_enqueue_scripts', array($this, 'aakriti_personal_blog_front_scripts'), 1 );
    
	}
 

	/**
	 * Enqueue styles for front-end
	 * 
	 * @package Aakriti Personal Blog
	 * @since 1.0
	 */
	function aakriti_personal_blog_front_styles() {
		global $wp_styles;
		

		// Font Awesome CSS
		wp_register_style( 'font-awesome', AAKRITI_BLOG_URL . '/assets/css/font-awesome.min.css', array(), AAKRITI_BLOG_VERSION);
		wp_enqueue_style( 'font-awesome' );		
		
		// Registring and enqueing Custombox css			
		wp_register_style( 'jquery-custombox', AAKRITI_BLOG_URL.'/assets/css/custombox.min.css', array(), AAKRITI_BLOG_VERSION );
		wp_enqueue_style( 'jquery-custombox' );				

		wp_enqueue_style( 'aakriti-personal-blog-fonts', aakriti_personal_blog_fonts_url(), array(), null );

		// Loads theme main stylesheet
		wp_enqueue_style( 'aakriti-personal-blog-style', get_stylesheet_uri(), array(), AAKRITI_BLOG_VERSION);

	}

	/**
	 * Enqueue scripts for front-end
	 * 
	 * @package Aakriti Personal Blog
	 * @since 1.0
	 */
	function aakriti_personal_blog_front_scripts() {		
                
		/*
		 * Adds JavaScript to pages with the comment form to support
		 * sites with threaded comments (when in use).
		 */
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
			wp_enqueue_script( 'comment-reply' );
		}	
		
		// Registring and enqueing Custombox js
        wp_register_script( 'jquery-custombox', AAKRITI_BLOG_URL . '/assets/js/custombox.min.js', array('jquery'), AAKRITI_BLOG_VERSION, true);
		wp_enqueue_script('jquery-custombox');
		
		// Public Js
		wp_register_script( 'aakriti-personal-blog-public-js', AAKRITI_BLOG_URL . '/assets/js/public.js', array('jquery'), AAKRITI_BLOG_VERSION, true);       
		wp_enqueue_script( 'aakriti-personal-blog-public-js' );               
        	
	}
}

$aakriti_personal_blog_script = new Aakriti_Personal_Blog_Script();