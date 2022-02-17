<?php

Class StayFit_Theme_Loader{

	/**
	 * Prefiks dla nazwa dokumentów
	 * (string) $prefix
	 */
	private $prefix;

	/**
	 * Zbiór plików szablonu
	 * (array) $repository
	 */
	private $repository;

	protected $fonts_url;

	public function __construct(){

		if( ! defined( "STAYFIT_THEME_URL" ) || 
			! defined( "STAYFIT_THEME_ASSETS_URL" ) ||
			! defined( "STAYFIT_THEME_DIR_PATH" ) ||
			! defined( "STAYFIT_THEME_ASSETS_PATH" )
		){
			wp_die( "Nieprawidłowa implementacja strony, brak definicji szablonu." );
			exit;
		}

		$this->prefix = "StayFit_Theme_";

		$this->site_options();

		$this->theme_repository();
		$this->load_theme_repository();

		$this->fonts();
		$this->hooks();
		//$this->shortcodes();

	}

	private function theme_repository(){

		$this->repository = array(
			"nav_icon_walker",
			"shortcode",
			"shortcode_pricing",
			"shortcode_schedule",
			"shortcode_contact",
			"site_header",
			"site_footer",
			"site_sections",
			"site_page",
		);

	}

	private function load_theme_repository(){

		if( empty( $this->repository ) || ! is_array( $this->repository ) ){
			wp_die( "Nieprawidłowa implementacja strony." );
			exit;
		}

		foreach( $this->repository as $name ){

			$real_name = $this->firstUpper( $name );
			$full_name = $this->prefix . $real_name;

			if( file_exists( STAYFIT_THEME_DIR_PATH . 'inc/' . $full_name . '.php' ) ){
				require_once  STAYFIT_THEME_DIR_PATH . 'inc/' . $full_name . '.php';

				if( class_exists( $full_name ) ){
					new $full_name;
				}
			}

		}

	}

	public function firstUpper( $value = '', $explode_str = '_' ){

		if( ! is_string( $value ) || 
			empty( $value ) || 
			! isset( $explode_str ) ){
			return false;
		}

		$explode = explode( $explode_str, $value );
		$map = array_map(function( $value ){
			return ucfirst( $value );
		}, $explode);

		return join( $explode_str, $map );

	}
	
	/**
	 * Rejestracja podstawowych wartości
	 * dla własnych ustawień szablonu 
	 *
	 * return @void;
	 */
	private function site_options(){

		require_once  STAYFIT_THEME_DIR_PATH . 'inc/StayFit_Theme_Options.php';
		StayFit_Theme_Options::Load();

	}


	private function shortcodes(){ /* Initialize Shortcode::init(); */ }

	private function hooks(){

		add_action( "wp_enqueue_scripts", array( $this, "theme_scripts" ) );
		add_action( "after_setup_theme", array( $this, "after_setup" ) );

	}

	public function theme_scripts(){

		$styles = array( "general", "layout", "typograph", "grids", "form", "buttons", "navigations", "alerts" );

		wp_enqueue_style( "stayfit-fonts", $this->fonts_url, array(), null );

		foreach( $styles as $order => $style ){
			wp_enqueue_style( "stayfit-" . $style, STAYFIT_THEME_ASSETS_URL . "css/theme/" . $style . ".css", array(), false );
		}

		wp_enqueue_style( "open-iconic", STAYFIT_THEME_ASSETS_URL . "iconic/open-iconic.css", array(), "1.1.0" );
		wp_enqueue_script( "jquery", "https://code.jquery.com/jquery-3.3.1.min.js", array(), "3.3.1", true );
		
		wp_enqueue_script( "script", STAYFIT_THEME_ASSETS_URL . "js/script.js", array(), false, true );
	
	}

	public function after_setup(){

		add_theme_support( "post-thumbnails" );

		register_nav_menus( array(
			"site-navigation"	=> "Nawigacja strony",
			"site-user-navigation"	=> "Nawigacja użytkownika",
		));

	}

	private function fonts(){ 

		$fonts_url = "";

		$fonts_family = array();
		$fonts_family[] = "Montserrat:400,700,900";
		$fonts_family[] = "Muli:400,700,900&amp;subset=latin-ext";
		$fonts_family[] = "Arimo:400,700";
		$fonts_family[] = "Hind:400,700";
		$fonts_family[] = "Alegreya+Sans:300,400";
		$fonts_family[] = "Palanquin:300,400,700";

		$query_args = array( 
			"family"	=> urlencode( implode( "|", $fonts_family ) )
		);

		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );

		$this->fonts_url = esc_url_raw( $fonts_url );

	}

}