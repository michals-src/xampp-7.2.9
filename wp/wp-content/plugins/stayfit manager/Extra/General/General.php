<?php

Class General{

  public function __construct(){


  	add_action("admin_post_submit_general_options", array($this, "save_options"));

  }

  public function load_template( $repository = array() ){
      $view = new View( "General/Template", array( "extra" => $repository ) );
  }


  public function save_options(){

  	$redirect_url = ( isset( $_POST['redirect_url'] ) ) ? $_POST['redirect_url'] : false;
  	$is_valid_nonce = ( isset( $_POST['stayfit_manager_save_options-general'] ) && wp_verify_nonce( $_POST['stayfit_manager_save_options-general'], 'submit_general_options-nonce' ) ) ? true : false;
  	
  	if( ! $is_valid_nonce || ! $redirect_url ){
  		return;
  	}



  	$a = StayFit_Theme_Options::Receive();
  	$b = $_POST['options'];
	$c = array_replace( $a, $b );

	$e = Form::is_empty( $b );
	

	if( ! empty( $e ) ){
		Form::CreateError( $_POST['error'], $e );
	}else{
		StayFit_Theme_Options::Update( $c );
	}

	//echo "<pre>", print_r( $this->is_empty( $c ), true ), "</pre>";
	//echo "<pre>", print_r( $e, true ), "</pre>";
	//echo "<pre>", print_r( Form::getError( $_POST['error'] ), true ), "</pre>";

	wp_redirect( $redirect_url );
	exit;
  }

}


?>
