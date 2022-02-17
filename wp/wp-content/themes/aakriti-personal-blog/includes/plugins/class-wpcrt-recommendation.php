<?php
/**
 * aakriti_personal_blog_Recommendation Class
 * 
 * Handles the recommended plugin functionality.
 * 
 * @package Aakriti Personal Blog
 * @since 1.0
 */

// Plugin recomendation class
require_once( AAKRITI_BLOG_DIR . '/includes/plugins/class-tgm-plugin-activation.php' );

class aakriti_personal_blog_Recommendation {

	function __construct() {
		
		// Action to add recomended plugins
		add_action( 'tgmpa_register', array($this, 'aakriti_personal_blog_recommend_plugin') );
	}

	/**
	 * Recommend Plugins
	 * 
	 * @package Aakriti Personal Blog
	 * @since 1.0
	 */
	function aakriti_personal_blog_recommend_plugin() {
	    $plugins = array(	       
	        array(
	            'name'               => __('Instagram Slider and Carousel Plus Widget', 'aakriti-personal-blog'),
	            'slug'               => 'slider-and-carousel-plus-widget-for-instagram',
	            'required'           => false,
	        )
	    );
	    tgmpa( $plugins);
	}
}

$aakriti_personal_blog_recommendation = new aakriti_personal_blog_Recommendation();