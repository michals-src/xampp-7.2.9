<?php

Class Exercises{

  public function __construct(){


  }

  public function load_template( $repository ){
      $view = new View( "Exercises/Template", array( "extra" => $repository ) );
  }

}


?>
