<?php

Class Shortcode{

    private $shortcodes = [];

    public function __construct( $shortcode_name = "", $shortcode_response = [] ){

        if( empty( $shortcode_name ) || ! is_string( $shortcode_name ) || empty( $shortcode_response ) ){
            return;
        }

        add_shortcode( $shortcode_name, $shortcode_response );

    }

}

?>
