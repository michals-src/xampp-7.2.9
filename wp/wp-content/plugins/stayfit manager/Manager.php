<?php
/**
 * Plugin name: Stay Fit - Manager
 * Author: Administrator
 */

if( ! defined("ABSPATH") ) exit;


define( "MG_PATH", plugin_dir_path(__FILE__) );
define( "MG_EXTRA_PATH", MG_PATH . 'extra\\'  );

// require_once general_path . 'Ajax.php';
// require_once general_path . 'Authentication.php';
// require_once general_path . 'Shortcode.php';
// require_once general_path . 'View.php';
//
// require_once general_path . 'Extra.php';
//
// require_once general_path . 'Load.php';
//
//
// add_action( "wp_loaded", "initialize_manager" );
// function initialize_manager(){
//
//   $loader = new Load();
//
// }

Class Manager{


    private static $_instance;

    private static $Authentication;
    private static $Dashboard;

    private static $Form;

    public function __construct(){

        $this->loadLibs();
        $this->setHooks();

    }

    private function setHooks(){

        add_action( "plugins_loaded", array( $this, "repository" ) );

        add_action( "admin_menu", array( $this, "admin_submenu" ) );
        add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar_render' ) );

    }

    public function init(){

        if( empty( self::$_instance ) ){
            self::$_instance = new Manager();
        }

        return self::$_instance;

    }

    public function repository(){


        $this->Dashboard = new Extra();
        $this->Form = new Form();

        Ajax::set();

    }

    private function loadLibs(){

        require_once MG_PATH . 'Ajax.php';
        require_once MG_PATH . 'Authentication.php';
        require_once MG_PATH . 'View.php';
        require_once MG_PATH . 'Navigation.php';

        require_once MG_PATH . 'Extra.php';

        require_once MG_PATH . 'Form.php';

    }

    public function admin_bar_render(){

      global $wp_admin_bar;
      $dashboard_url = get_permalink( 77 );

        $frontend_dashboard = array(
          'parent' => false,
          'id'     => 'stayfit-dashboard-main',
          'title'  => "Dashboard",
          'href'   => $dashboard_url
        );
        $wp_admin_bar->add_menu( $frontend_dashboard );


    }

    public function admin_submenu(){

      add_menu_page(
        'Manager admin',
        'Manager admin',
        'manage_options',
        'manager_admin',
        array( $this, "admin_submenu_page"),
        'dashicons-admin-tools',
        3
      );

    }

    public function admin_submenu_page(){

        global $pagenow;

        echo $pagenow;

    }


}

Manager::init();
