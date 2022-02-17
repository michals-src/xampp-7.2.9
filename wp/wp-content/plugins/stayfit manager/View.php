<?php

Class View{

    private $path;
    private $params;

    public function  __construct( $path = '', $params = [] ){

        $this->path = $path;
        $this->params = $params;

        $this->response();

    }

    public function __get( $name ){

        if( array_key_exists( $name, $this->params ) ){
            return $this->params[ $name ];
        }else if( ! empty( $this->params["extra"] ) &&
                    array_key_exists( $name, $this->params["extra"] )
        ){
            if( is_array(  $this->params["extra"][ $name ] ) &&
                array_key_exists( "constructor", $this->params["extra"][ $name ] )
            ){
                return $this->params["extra"][ $name ]["constructor"];
            }
            return $this->params["extra"][ $name ];
        }

        return false;

    }

    private function response(){

        $full_path = MG_EXTRA_PATH . $this->path . '.php';

        if( file_exists( $full_path ) ){

            require_once $full_path;

        }

    }

}

 ?>
