<?php


Class Authentication{

  /**
   * string @$redirect_login
   */
  private $login_url = '';

  /**
   * string @$redirect_login
   */
  private $login_redirect_url = '';

  /**
   * string @logout_url
   */
  private $logout_url = '';

  /**
   * object @$current_user
   */
  private $current_user = array();

  public static function getLogout(){

      if( ! is_user_logged_in() ){
          return false;
      }

      $logout_url = wp_logout_url( home_url() , true );

      return sprintf( '<a href="%s">%s</a>',  $logout_url, "Wyloguj się" );
  }


  public function getLoginUrl(){
    return $this->login_url;
  }

  public function getLoginRedirectUrl(){
    return $this->login_redirect_url;
  }

  public function isLogged(){
    return is_user_logged_in();
  }

  public function getUser(){
    return $this->current_user;
  }

}

?>
