<?php
/**
* Plugin Name: Job listing
* Plugin URI: http://host.pl/
* Author: Cameolon
* Description: Lorem Ipsum
* Version: 0.0.1
* License: GPLv2
*/

if( !defined('ABSPATH') )
{
	exit;
}

/*
add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page(){
	add_menu_page( 'custom menu title', 'custom menu', 'manage_options', 'custompage', 'my_custom_menu_page', plugins_url( 'myplugin/images/icon.png' ), 6 ); 
}

function my_custom_menu_page(){
	echo "Admin Page Test";	
}
*/


require_once plugin_dir_path(__FILE__) . 'wp-job-cpt.php';
require_once plugin_dir_path(__FILE__) . 'wp-job-settings.php';
require_once plugin_dir_path(__FILE__) . 'wp-job-fields.php';
require_once plugin_dir_path(__FILE__) . 'wp-job-shortcode.php';

function cmm_admin_enqueue_scripts() {
	//These varibales allow us to target the post type and the post edit screen.
	global $pagenow, $typenow;

	if( $typenow == 'job' )
	{
		wp_enqueue_style( 'cmm-admin-css', plugins_url( 'css/admin-jobs.css', __FILE__ ) );
	}
	
	if ( ($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'job' ) {
		//Plugin Main CSS File.
		wp_enqueue_style( 'cmm-admin-css', plugins_url( 'css/admin-jobs.css', __FILE__ ) );
		//Plugin Main js File.
		wp_enqueue_script( 'cmm-admin-job-js', plugins_url( 'js/admin-jobs.js', __FILE__ ), array( 'jquery', 'jquery-ui-datepicker' ), '20150204', true );
		//Quicktags js file.
		wp_enqueue_script( 'cmm-custom-quicktags', plugins_url( 'js/cmm-quicktags.js', __FILE__ ), array( 'quicktags' ), '20150206', true );
		//Datepicker Styles
		wp_enqueue_style( 'jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
		
		wp_enqueue_media();
        wp_register_script('my-admin-js', WP_PLUGIN_URL.'/wp-job-listing/js/my-admin-script.js', array('jquery'));
        wp_enqueue_script('my-admin-js');
	}

	if ( $pagenow =='edit.php' && $typenow == 'job') {
		wp_enqueue_script( 'reorder-js', plugins_url( 'js/reorder.js', __FILE__ ), array( 'jquery', 'jquery-ui-sortable' ), '20150626', true );
		wp_localize_script( 'reorder-js', 'WP_JOB_LISTING', array(
			'security' => wp_create_nonce( 'wp-job-order' ),
			'success' => 'Jobs sort order has been saved',
			'failure' => 'There was an error saving the sort order, or you do not have proper permissions'
		) );
	}
}
//This hook ensures our scripts and styles are only loaded in the admin.
add_action( 'admin_enqueue_scripts', 'cmm_admin_enqueue_scripts' );