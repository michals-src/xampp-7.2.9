<?php

Class Extra{

  private $navigation = [];
  private $container = [];

  public function __construct(){

    if( is_user_logged_in() ){

        $this->navigation = $this->navigation();

        $this->listen( "general" );

        $this->listen( "timetable" );
        //$this->listen( "pricing" );
        //$this->listen( "schedule" );
        $this->listen( "exercises" );
        //$this->listen( "contact" );

    }

    $this->listen( "login" );
    $this->listen( "dashboard", array(
        "repository" => $this->container,
        "navigation" => $this->navigation
    ) );

  }

  private function navigation(){

      return [
          array( "slug" => "general", "label" => "Ustawienia główne" ),
          array( "slug" => "notices", "label" => "Powiadomienia" ),
          array( "slug" => "exercises", "label" => "Zajęcia" ),
          array( "slug" => "timetable", "label" => "Rozkład zajęć" ),
          array( "slug" => "pricing", "label" => "Cennik" ),
      ];

  }

  private function listen( $repository = '', $atts = array() ){

      $repository = ucfirst( stripslashes( $repository ) );

      $path = MG_EXTRA_PATH . $repository . '/' . $repository . '.php';

      require_once $path;
      $constructor = new $repository( $atts );

      $this->container[ $repository ] = array();
      $this->container[ $repository ]["path"]  = $path;
      $this->container[ $repository ]["constructor"] = $constructor;

  }

  public function get(){
      return $this->container;
  }

}

?>
