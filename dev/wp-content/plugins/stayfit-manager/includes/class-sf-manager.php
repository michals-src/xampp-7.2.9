<?php

Class Sf_Manager{

    public static $_instance;

    public static function instance(){

        if( ! isset( $_instance ) ) self::$_instance = new Sf_Manager;
        return self::$_instance;

    }

    public function __construct(){

        /** 
         * 
         * Login page
         * Dashboard
         *  - Ustawienia główne
         *  - Powiadomienia (Notices + Modal)
         *  - Zajęcia (Oferta)
         *  - Grafik (Grafik)
         *  - Karnety (Cennik)
         * 
         * 
         * Frontend view
         * 
        */


        /** 
         * 
         * install (default options)
         * post_type (Register post_types)
         * ajax (Endpoint)
         * shortcodes (Register shortcodes)
         *  - templates (Engine templates)
        */

        $this->constants();
        $this->includes();
        $this->hooks();

    }

    public function hooks(){

        add_action( 'init', array( 'Sf_Shortcode', 'init' ) );
        add_action( 'init', array( 'Sf_Form_Handle', 'init' ) );
        add_action( 'init', array( 'Sf_Ajax', 'init' ) );


    }

    public function includes(){
        
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-ajax.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-install.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-post_type.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-shortcode.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-options.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-form.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-template.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-scripts.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-form-handle.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-shortcode-output.php';

        require_once SF_MANAGER_ABSPATH . '/barcode-generator/src/BarcodeGenerator.php';
        require_once SF_MANAGER_ABSPATH . '/barcode-generator/src/BarcodeGeneratorPNG.php';

        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-monitor.php';
        
        require_once SF_MANAGER_ABSPATH . '/includes/sf-dashboard-functions.php';
        require_once SF_MANAGER_ABSPATH . '/includes/class-sf-dashboard.php';

        do_action( 'sf_manager_before_dashboard' );

    }

    public function constants(){
        
        $this->define( "SF_MANAGER_VERSION", "1.0.1" );
        $this->define( "SF_MANAGER_ABSPATH", dirname( SF_MANAGER_FILE ) );
        $this->define( "SF_MANAGER_URL", plugin_dir_url( SF_MANAGER_FILE ) );

    }
    
    protected function define( $name = '', $value = '' ){
        if( ! defined( $name ) ){
            define( $name, $value );
        }
    }

    public function ajax_url(){
        return admin_url( 'admin-ajax.php', 'relative' );
    }

    public function Dashboard(){
        return Sf_Dashboard::instance();
    }

    public function Options(){
        return Sf_Options::instance();
    }

}