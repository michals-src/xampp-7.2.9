<?php

Class Stayfit_Theme_Site_Sections{

	private $section;

	public function __construct(){

		$this->sections = array(
			"banner" => array( "order" => 0 ),
			"offer" => array( "order" => 1 ),
			"about" => array( "order" => 2 ),
			"news" => array( "order" => 3 ),
			"likes" => array( "order" => 4 ),
			"location" => array( "order" => 5 )
		);

		add_action( "stayfit_theme_sections", array( $this, "sections" ) );

	}

	public function sections(){
		
	}

}