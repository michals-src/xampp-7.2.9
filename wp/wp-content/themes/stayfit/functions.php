<?php

define( "STAYFIT_THEME_URL", get_template_directory_uri() );
define( "STAYFIT_THEME_ASSETS_URL", get_template_directory_uri() . '/assets/' );
define( "STAYFIT_THEME_DIR_PATH", trailingslashit( get_template_directory() ) );
define( "STAYFIT_THEME_ASSETS_PATH", trailingslashit( get_template_directory() ) . 'assets/' );

require_once STAYFIT_THEME_DIR_PATH . 'inc/StayFit_Theme_Loader.php';

function stayfit_theme_setup(){
	new StayFit_Theme_Loader;
}
add_action( "after_setup_theme", "stayfit_theme_setup" );

function special_nav_class ($classes, $item) {
    if (in_array('current-post-ancestor', $classes) || 
    	in_array('current-menu-item', $classes) ){
        $classes[] = 'current-item ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);