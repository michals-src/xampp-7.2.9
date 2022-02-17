<?php

Class Timetable{

  public function __construct(){

    add_action("init", array($this, "timetable_init"));

    add_action("admin_post_submit_timetable_clock", array($this, "save_timetable_clock"));
    add_action("admin_post_submit_timetable_clock_editor", array($this, "save_timetable_clock_editor"));

    add_action( "wp_ajax_timetable-time", array( $this, 'ajax_response' ) );

    $this->create_post_timetable();
    $this->repository();

  }

  public function load_template( $repository = array() ){

    $action = $_GET['action'];
    $editItem = $_GET['editItem'];

    if( ! empty( $action ) && ! empty( $editItem ) 
      && is_string( $action ) && is_string( $editItem ) 
      && $action === 'timetable_edit' 
    ){
      $view = new View( "Timetable/TemplateEdit", array( "extra" => $repository, 'editItem' => $editItem ) );
    }else{
      $view = new View( "Timetable/Template", array( "extra" => $repository ) );
    }


  }

  private function repository(){

    wp_enqueue_script( 'mg-timetable-time', plugins_url('js/time.js', __FILE__), array( 'jquery' ), false, true );

  }

  public function timetable_init(){

    $this->timetable_posttype();
    $this->timetable_taxonomy();

  }

  private function timetable_posttype(){

    $singular = "Timetable";
    $plural = "Timetable";

    $labels = array(
      'name'      => $plural,
      'singular_name'   => $singular,
      'add_new'     => 'Add New',
      'add_new_item'    => 'Add New ' . $singular,
      'edit'            => 'Edit',
      'edit_item'         => 'Edit ' . $singular,
      'new_item'          => 'New ' . $singular,
      'view'      => 'View ' . $singular,
      'view_item'     => 'View ' . $singular,
      'search_term'     => 'Search ' . $plural,
      'parent'    => 'Parent ' . $singular,
      'not_found'     => 'No ' . $plural .' found',
      'not_found_in_trash'  => 'No ' . $plural .' in Trash'
    );

    $args = array(
      'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_nav_menus'   => false,
        'show_ui'             => false,
        'show_in_menu'        => false,
        'show_in_admin_bar'   => false,
        'menu_position'       => 10,
        'menu_icon'           => 'dashicons-businessman',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => false,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        // 'capabilities' => array(),
        'rewrite'             => array(
            'slug' => $slug,
            'with_front' => true,
            'pages' => true,
            'feeds' => true,
        ),
        'supports'            => array()
    );

    register_post_type( 'timetable', $args );

  }

  private function timetable_taxonomy(){
    
    $plural = "Godziny";
    $singular = "Godzina";

    $labels = array(
      'name'                       => $plural,
          'singular_name'              => $singular,
          'search_items'               => 'Search ' . $plural,
          'popular_items'              => 'Popular ' . $plural,
          'all_items'                  => 'All ' . $plural,
          'parent_item'                => null,
          'parent_item_colon'          => null,
          'edit_item'                  => 'Edit ' . $singular,
          'update_item'                => 'Update ' . $singular,
          'add_new_item'               => 'Add New ' . $singular,
          'new_item_name'              => 'New ' . $singular . ' Name',
          'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
          'add_or_remove_items'        => 'Add or remove ' . $plural,
          'choose_from_most_used'      => 'Choose from the most used ' . $plural,
          'not_found'                  => 'No ' . $plural . ' found.',
          'menu_name'                  => $plural,
    );

    $args = array(
          'hierarchical'          => true,
          'labels'                => $labels,
          'show_ui'               => true,
          'show_admin_column'     => true,
          'update_count_callback' => '_update_post_term_count',
          'query_var'             => true,
          'rewrite'               => array( 'slug' => $slug ),
    );

    register_taxonomy('timetable-clock', 'timetable', $args);

  }

  private function create_post_timetable(){
  
    $args = array(
      'post_type'        => 'timetable',
      'post_status'      => 'publish',
    );
    $posts_array = get_posts( $args );

    if( empty( $posts_array ) ){
      wp_insert_post(array(
        'post_title' => 'Timetable',
        'post_content' => 'Wpis zawierający dane grafiku',
        'post_type' => 'timetable',
        'post_status' => 'publish'
      ));
    }

  }

  public function save_timetable_clock(){
        
    $redirect_url = ( isset( $_POST['redirect_url'] ) ) ? $_POST['redirect_url'] : false;
    $is_valid_nonce = ( isset( $_POST['stayfit_manager_save_timetable-clock'] ) && wp_verify_nonce( $_POST['stayfit_manager_save_timetable-clock'], 'submit_timetable_clock-nonce' ) ) ? true : false;
    
    if( ! $is_valid_nonce || ! $redirect_url ){
      //wp_redirect( $redirect_url );
      //exit;
    }

    $timetable_clock = $_POST['timetable'];
    $is_empty = Form::is_empty( $timetable_clock );

    if( ! empty( $is_empty ) ){
      Form::CreateError( $_POST['error'], $is_empty );
    }else{
      $result = wp_insert_term( $timetable_clock['clock'], 'timetable-clock' );
      if( is_wp_error( $result ) ){
        Form::CreateError( $_POST['error'], ['clock' => $result->get_error_message() ] );
      }else{
        $args = array(
          'post_type'        => 'timetable',
          'post_status'      => 'publish',
        );
        $posts_array = get_posts( $args );
        $a = wp_set_object_terms( $posts_array[0]->ID, $result['term_id'], 'timetable-clock', true );
      }
      
    }

    wp_redirect( $redirect_url );
    exit;

  }

  public function save_timetable_clock_editor(){

    $redirect_url = ( isset( $_POST['redirect_url'] ) ) ? $_POST['redirect_url'] : false;
    $is_valid_nonce = ( isset( $_POST['stayfit_manager_save_timetable-clock-editor'] ) && wp_verify_nonce( $_POST['stayfit_manager_save_timetable-clock-editor'], 'ubmit_timetable_clock_editor-nonce' ) ) ? true : false;
    
    if( ! $is_valid_nonce || ! $redirect_url ){
      //wp_redirect( $redirect_url );
      //exit;
    }

    $timetable_clock = $_POST['timetable'];
    $is_empty = Form::is_empty( $timetable_clock );

    if( ! empty( $is_empty ) ){
      Form::CreateError( $_POST['error'], $is_empty );
    }else{
      $result = wp_update_term( $_POST['item_id'], 'timetable-clock', array( "name" => $timetable_clock['clock'] ) );
      if( is_wp_error( $result ) ){
        Form::CreateError( $_POST['error'], ['clock' => $result->get_error_message() ] );
      }   
    }

    $redirect_url = add_query_arg(array(
      'saved' => $_POST['item_id']
    ), $redirect_url);
    wp_redirect( $redirect_url );
    exit;

  }

  public function ajax_response( $data ){

      if( ! check_ajax_referer( "ajax_timetable-time-nonce", "nonce" ) ){
          wp_die( print_r( " Oops ! Wystąpił błąd podczas weryfikacji. " ) );
      }


      if( $_POST['item_action'] === "edit" ){
        wp_update_term( $_POST['item_id'], 'timetable-clock', array( "name" => $_POST['value'] ) );
      }else if( $_POST['item_action'] === "delete" ){
        wp_delete_term( $_POST['item_id'], 'timetable-clock' );
      }

      wp_send_json_success();

  }

}


?>
