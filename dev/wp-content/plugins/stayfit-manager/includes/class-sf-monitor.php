<?php

Class Sf_Monitor{

	private $public_id;
	private $user;
	private $meta_template;

	public function __construct( $id = array() ){

		if( empty( $id ) ){
			return;
		}

		$this->public_ids = $id;
		$this->users = $this->get_user();
		

	}

	private function get_user(){

		$users = array();

		for( $x = 0; $x < count( $this->public_ids ); $x++ ){
			$user_query = new WP_User_Query(array(
				'number' => 1,
				'meta_key' => 'public_id',
				'meta_value' => $this->public_ids[$x],
				'fields' => array( 'ID', 'user_registered' )
			));

			
			if( ! empty( $user_query->get_results() ) ){
				$users[] = $user_query->get_results();
			}
		}

		return $users;

	}

	public function user_registered(){

		$date = array();

		for( $x = 0; $x < count( $this->users ); $x++ ){
			$date[] = $this->users[$x][0]->user_registered;
		}

		return $date;

	}

	public function results(){

		$meta = array();

		for( $x = 0; $x < count( $this->users ); $x++ ){
			$user_meta = get_user_meta( $this->users[$x][0]->ID, 'user_monitor' );
			if( !empty( $user_meta ) ){
				$meta[] = $user_meta;
			}
			array_push( $meta[$x], $this->users[$x][0]->ID );
		}


		return $meta;

	}

	public function add( $args = array() ){

		$monitor_data = array(
			"error" => false,
			"msg" => ''
		);

		if( empty( $this->users ) ){

			$monitor_data["error"] = true;
			$monitor_data["msg"] = "Nie znaleziono użytkownika.";

			return $monitor_data;
		}
		    // update_user_meta( $this->users[0][0]->ID, "user_monitor", array(
      //           "01" => array(), "02" => array(),
      //           "03" => array(), "04" => array(),
      //           "05" => array(), "06" => array(),
      //           "07" => array(), "08" => array(),
      //           "09" => array(), "10" => array(),
      //           "11" => array(), "12" => array(),
      //           "last" => null
      //       ));
		
		for( $x = 0; $x < count( $this->users ); $x++ ){

			$data = $this->results()[$x][0];

			$first_name = get_user_meta( $this->users[$x][0]->ID, "first_name" );
			$last_name = get_user_meta( $this->users[$x][0]->ID, "last_name" );

			if( $data["last"] !== null ){

				$time_interval = $this->time_interval( date( $data["last"] ) );

				if( $time_interval->error && ! empty( $time_interval->msg ) ){
					
					$monitor_data["error"] = true;
					$monitor_data["msg"] = str_replace( '@ID', $first_name[0] . ' ' . $last_name[0], $time_interval->msg );

					return $monitor_data;
				}
			}

			$arg_date = '';
			foreach ($args as $month => $date) {
				$data[$month][] = $date;
				$arg_date = $date;
			}

			$data['last'] = $arg_date;

			update_user_meta( $this->users[$x][0]->ID, 'user_monitor', $data );

			$monitor_data['msg'] = sprintf( 
				"\"%s %s\" zarejestrowano akcję %s ",
				$first_name[0],
				$last_name[0],
				$arg_date
			);

			return $monitor_data;

		}
	
	}

	private function time_interval( $old_date ){

		$czas_jeden = strtotime( $old_date );
	  	$czas_dwa = strtotime(date("Y-m-d H:i:s"));

	  	// Minuty * @sekund
	  	$czas_limit = 5 * 60;

	  	$interval = $czas_dwa - $czas_jeden;


	  	$czas_oczekiwania = array(
	  		"text" => "minut",
	  		"minutes" => ( ( $czas_limit - $interval ) / 60),
	  		"seconds" => ( ( 60 * ceil( ( $interval / 60 ) ) ) - $interval )
	  	);


	  	$time_data = (object) array(
	  		"error" => false,
	  		"msg" => ''
	  	);

	  	if( $interval <= $czas_limit ){
	  		$time_data->error = true;
	  		$time_data->msg = sprintf( 
	  			'"@ID" już zostało zarejestrowane %s. Proszę odczekać %d minut %d sekund', 
	  			$old_date, 
	  			$czas_oczekiwania["minutes"], 
	  			$czas_oczekiwania["seconds"] 
	  		);
	  	}

	  	return $time_data;

	}

}