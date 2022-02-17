<?php

Class Form{

    private $action;

    private $method;

    private $values;

    public static function CreateError( $error_name = '', $error_data = '' ){

        if( ! empty( $error_name ) && is_string( $error_name ) ) {
            if( is_user_logged_in() ){
                add_user_meta( get_current_user_ID(), $error_name, $error_data );
            }else{
                //zapisywanie błędów dla niezalogowanych użykowników
            }
        }

    }

    public static function getError( $error_name = '' ){

        if( is_user_logged_in() ){
            return get_user_meta( get_current_user_ID(), $error_name );
        }

        return '';

    }

    // Usuwa rekord z user_meta
    public static function reloadError( $error_name = '' ){

        if( is_user_logged_in() ){
            delete_user_meta( get_current_user_ID(), $error_name );
        }

    }

     public static function hasError( $error_name = '', $path = '' ){

        $error = array(
            'has-error' => '',
            'message' => ''
        );

        $errors = self::getError( $error_name );


        if( is_user_logged_in() &&
            ! empty( $errors ) 
        ){


            $full_path = explode( "/", $path );
            $first_level = array_key_exists( $full_path[0] , $errors[0] ) ? $errors[0][$full_path[0]] : '';
            
            $path = array_slice( $full_path, 1 );

            $current_level = $first_level;

            if( ! empty( $current_level ) ){
                for( $x = 0; $x < count( $path ); $x++ ){
                    $current_level = $current_level[ $path[$x] ];
                }
                if( ! empty( $current_level ) ){
                    $error['has_error'] = ' form-group-has-error ';
                    $error['message'] = '<p class="form-input-label">' . $current_level . '</p>';
                }
            }



        }

        return (object) $error;

    }

    public static function is_empty( $args = array() ){

        $abc = array();

        foreach( $args as $key => $value){

            if( is_array( $value ) ){
                $child = self::is_empty( $value );
                if( ! empty( $child ) ){
                    $abc[$key] = $child;
                }
            }else{

                if( empty( $value ) ){
                    $abc[$key] = "Pole nie może być puste";
                }

        }

    }

    return $abc;

    }

    public function sculpt( $properties = array() ){



    }

    public function with( $parameters = array() ){

        $this->values = $parameters;

        return $this;

    }

    public function render(){

    }

    private function label_field(){ }
    private function text_field(){ }
    private function password_field(){ }
    private function number_field(){ }
    private function checkbox_field(){ }
    private function radio_field(){ }
    private function textarea_field(){ }
    private function button(){ }

    private function notice_field( /* $text, $type = "info"  */ ){ }
    private function desc_field( /* $text, $type = "info"  */ ){ }

}
