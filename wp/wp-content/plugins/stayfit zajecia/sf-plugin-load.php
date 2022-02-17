<?php


/** Copyright (C) 2018 Stay Fit - All rights reserved
 *
 * Plugin name: Zajęcia (Stay Fit)
 * Description: Dodatek dla szablonu Stay Fit - Seryous
 * Author: Administrator
 *
 */

if( ! defined("ABSPATH") ) exit;

require_once plugin_dir_path(__FILE__) . "sf-plugin-post_type.php";
require_once plugin_dir_path(__FILE__) . "sf-plugin-fields.php";
require_once plugin_dir_path(__FILE__) . "sf-plugin-shortcode.php";


function custom_login_return( $args) {

  ob_start();
  if ( ! is_user_logged_in() ) { // Display WordPress login form:
      $args = array(
          'redirect' => admin_url(),
          'form_id' => 'loginform-custom',
          'label_username' => __( 'Username custom text' ),
          'label_password' => __( 'Password custom text' ),
          'label_remember' => __( 'Remember Me custom text' ),
          'label_log_in' => __( 'Log In custom text' ),
          'remember' => true
      );
      wp_login_form( $args );
  } else { // If logged in:
      wp_loginout( home_url() ); // Display "Log Out" link.
      echo " | ";
      wp_register('', ''); // Display "Site Admin" link.
  }
  return ob_get_clean();
}

add_shortcode( "custom_login", "custom_login_return" );

?>
