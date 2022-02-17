<?php

Class Login{


  public function __construct(){

      //this->view->protection( "unsigned" );
      add_shortcode( "manager_login", array( $this, "shortcode" ) );

      //$this->createForm();

      //$this->ajax( "login", $this->get() );

      Ajax::register( array(
          "security" => wp_create_nonce( "manager-signon-security" ),
          "target" => "manager-login",
          "url" => "manager_request_login",
          "response" => array( $this, "request_login" ),
          "redirect" => get_home_url()
      ), false );

  }

  /**
   *
   *  Shortcode [manager_login]
   *
   *  @since 1.0.0
   *
   */
  public function shortcode( $atts ){

      $params = is_array( $atts ) ? $atts : [];

      ob_start();


      $path = "Login/Template";
      $params = array();

      if( is_user_logged_in() ){
          $path .= "_LoggedIn";
          $params["user"] = wp_get_current_user();
      }

      $view = new View( $path, $params );


      $content = ob_get_contents();
      ob_end_clean();

      return $content;

  }

  public function request_login(){

      if( ! check_ajax_referer( "manager-signon-security", "nonce" ) ){
          wp_die( print_r( " Oops ! Wystąpił błąd podczas logowania. " ) );
      }

      $username = $_POST["manager-username"];
      $password = $_POST["manager-pwd"];
      $rememberme = isset( $_POST["manager-remeber"] );

      $secure_cookie = is_ssl() ? true : false;

      if( empty( $username ) || empty( $password ) ){
          wp_send_json_error( array( "message"   => "Proszę uzupełnić wszystkie pola." ) );
      }

      $creds = array();
      $creds["user_login"] = $username;
      $creds["user_password"] = $password;
      $creds["remember"] = $rememberme;

      $wp_signon = wp_signon( $creds, $secure_cookie );

      if( is_wp_error( $wp_signon ) ){
          wp_send_json_error( array( "message"   => "Nieprawidłowa nazwa użytkownika lub hasło." ) );
      }

     wp_send_json_success();

  }

}


?>
