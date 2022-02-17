<?php

Class Navigation{

    private $container = array();

    public function add( $name ){

      array_push( $this->container, $name );

    }

    public function get(){
      return $this->container;
    }

    public function set(){


    }

}

?>
