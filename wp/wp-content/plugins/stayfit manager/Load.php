<?php


Class Load{

  private $authentication;

  private $shortcode;

  private $extra;

  private $view;

  private $admin_url;

  private $noticeMessage;

  public function __construct(){


      $this->admin_url = admin_url( "edit.php?page=reorder_jobs");

      $this->authentication = new Authentication( $this->getLoginPageUrl(), $this->getLoginRedirectPageUrl() );
      $this->shortcode = new Shortcode();

      $this->view = new View();
      $this->extra = new Extra( $this->shortcode, $this->view );

      $this->view->addExtraRepository( $this->extra->getRepository() );


      add_action( "admin_menu", array( $this, "sub_menu" ) );
      add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar_render' ) );

      $this->set();

  }

  public function set(){

      $this->shortcode->set();

      //$this->navigation->set();

  }

  public function getPage( $spy = '', $slug = false ){

      if( empty( $spy ) ){
        return false;
      }

      if( ! is_bool( $slug ) ){
        $slug = false;
      }

      $page = false;

      if( is_numeric( $spy ) ){
        $page = get_page_by_ID( $spy );
      }else if( is_string( $spy ) ){
        $page = get_page_by_title( $spy );
        if( true === $slug ){
          $page = get_page_by_path( $spy );
        }
      }

      return $page;

  }

  private function getLoginPageUrl(){

      $page = $this->getPage( "login" );
      $url = ( ! empty( $page ) ) ? get_permalink( $page->ID ) : '';

      if( empty( $page ) ){
          $this->notice( "Nie odnaleziono strony logowania." );
      }

      return $url;

  }

  private function getLoginRedirectPageUrl(){

      $page = $this->getPage( "dashboard" );
      $url = ( ! empty( $page ) ) ? get_permalink( $page->ID ) : '';

      if( empty( $page ) ){
          $this->notice( "Nie odnaleziono strony dashboard." );
      }

      return $url;

  }

  public function notice( $message = '' ){
    $this->noticeMessage = $message;
    add_filter( "admin_notices", array( $this, "notice_content" ) );
  }

  public function notice_content( $message = '' ){
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php echo $this->noticeMessage; ?></p>
    </div>
    <?php
  }

  public function admin_bar_render(){

    global $wp_admin_bar;
    $dashboard_url = admin_url( "edit.php?page=reorder_jobs");

      $frontend_dashboard = array(
        'parent' => true,
        'id'     => 'stayfit-dashboard-main',
        'title'  => "Testowa strona",
        'href'   => $this->admin_url
      );
      $wp_admin_bar->add_menu( $frontend_dashboard );


  }

  public function sub_menu(){

    add_submenu_page(
      'edit.php',
      'Reorder Jobs',
      'Reorder Jobs',
      'manage_options',
      'reorder_jobs',
      array( $this, "loaded")
    );

  }

  public function loaded(){

    //$this->seeArr( $this->extra->getRepository()["General"]["constructor"]->setAssets() );
    //$this->seeArr( $this->shortcode->get() );

      //abc

  }

  private function seeArr( $object ){
      echo "<pre>", print_r( $object, true ), "</pre>";
  }

}
