<?php

Class StayFit_Theme_Options{

	private static $images_path;

	private static $wp_option_name;

	private static $site_default_options;

	public static function Load(){

		self::$wp_option_name = "stayfit_theme";
		self::$images_path = STAYFIT_THEME_URL . 'obrazki/';

		$options = array();
		$options["banner"] = array();
			$options["banner"]["before_title"] = "Klub fitness";
			$options["banner"]["title"] = ( ! empty( get_bloginfo( "name" ) ) ) ? get_bloginfo( "name" ) : "Stay Fit";
			$options["banner"]["label"] = ( ! empty( get_bloginfo( "description" ) ) ) ? get_bloginfo( "description" ) : "Profesjonalni instruktorzy, kamerlane grupy fitness, miła atmosfera";
			$options["banner"]["background"] = array(
				"image"	=> self::$images_path . "site-banner-bg-1800-700.jpg",
				"ID"	=> false
			);
			$options["banner"]["images"] = array(
				"site-banner-image-lg"	=> array(
					"image"	=> self::$images_path . "site-header-image-568-760.png",
					"ID"	=> false
				),
				"site-banner-image-md"	=> array(
					"image"	=> self::$images_path . "site-header-image-450-662.png",
					"ID"	=> false
				),
				"site-banner-image-sm"	=> array(
					"image"	=> self::$images_path . "site-header-image-356-487.png",
					"ID"	=> false
				),
			);

		$options["socials"] = array();
			$options["socials"]["fb"] = array(
				"url"	=> "https://www.facebook.com/stayfit.bialystok/",
				"image"	=> "http://www.myiconfinder.com/uploads/iconsets/256-256-671dcbd218ad978e77115f7e3475e454-facebook.png",
				"ID"	=> false
			);

		$options["site"] = array();
			$options["site"]["logo"] = array();
				$options["site"]["logo"]["image"] = "https://www.freeiconspng.com/uploads/courses-icon-10.png";
				$options["site"]["logo"]["width"] = 35;
				$options["site"]["logo"]["height"] = 35;
				$options["site"]["logo"]["ID"] = false;

			$options["site"]["description"] = "Klub prowadzi szereg zajęć fitness poprawiające wygląd sylwetki, wzmocnienia mięśni, zmniejszenia obwodu ud, ujędrnienia ciała, pozbycia się cellulitu czy poprawy kondycji. Nasz klub wyróżnia się mniejszymi grupami dzięki czemu instruktor może poświecić więcej czasu dla osoby ćwiczącej. Doświadczeni instruktorzy pomogą dla Twojego ciała i zdrowia nabrać swietnej kondycji oraz wspaniałego wyglądu.";
			$options["site"]["map"] = "";
			$options["site"]["location"] = array();
				$options["site"]["location"]["street"] = "Przytulna 1";
				$options["site"]["location"]["place_no"] = "4";
				$options["site"]["location"]["postal_code"] = "15-001";
				$options["site"]["location"]["city"] = "Białystok";
			$options["site"]["contact"] = array();
				$options["site"]["contact"]["dialling_code"] = "510 231 237";
				$options["site"]["contact"]["phone_number"] = "510 231 237";
				$options["site"]["contact"]["email"] = "stayfit.bialystok@wp.pl";

		if( get_site_option( self::$wp_option_name ) === false ){
			add_site_option( self::$wp_option_name, $options );
		}
		//update_site_option( self::$wp_option_name, $options );

	}

	public function Update( $options = array() ){
		
		if( empty( $options ) || ! is_array( $options) ){ return ''; }

		update_site_option( self::$wp_option_name, $options );

		return $options;

	}

	public static function Receive(){

		$options = get_site_option( self::$wp_option_name );

		if( empty( $options ) || 
			! is_array( $options ) ){
			return [];
		}

		return $options;
	}

	public static function get( $option_path = "" ){

		$options = get_site_option( self::$wp_option_name );

		if( empty( $option_path ) || 
			! is_string( $option_path ) ){
			return '';
		}

		$full_path = explode( "/", $option_path );
		$first_level = array_key_exists( $full_path[0] , $options ) ? $options[$full_path[0]] : '';
		
		$path = array_slice( $full_path, 1 );

		$current_level = $first_level;

		if( ! empty( $current_level ) ){
			for( $x = 0; $x < count( $path ); $x++ ){
				$current_level = $current_level[ $path[$x] ];
			}
		}

		return $current_level;
	}

	public static function getImage( $option_path = '' ){

		if( empty( $option_path ) || 
		  ! is_string( $option_path ) ){
			return '';
		}

		$option = ( ! empty( self::get( $option_path ) ) ) ? self::get( $option_path ) : '';
		$image = ( ! empty( $option["image"] ) ) ? $option["image"] : '';

		if( ! empty( $option["ID"] ) && is_numeric( $option["ID"] ) ){
			$image = wp_get_attachment_image_src( $option["ID"], "medium" );
		}

		return $image;

	}

}