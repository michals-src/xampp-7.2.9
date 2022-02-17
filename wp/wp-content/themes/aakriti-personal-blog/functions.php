<?php
/**
 *  Aakriti Personal Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 */

// Defining Some Variable
if( !defined( 'AAKRITI_BLOG_VERSION' ) ) {
	define('AAKRITI_BLOG_VERSION', '1.0.6'); // Theme Version
}
if( !defined( 'AAKRITI_BLOG_DIR' ) ) {
	define( 'AAKRITI_BLOG_DIR', get_template_directory() ); // Theme dir
}
if( !defined( 'AAKRITI_BLOG_URL' ) ) {
	define( 'AAKRITI_BLOG_URL', get_template_directory_uri() ); // Theme url
}


// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 900;
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aakriti_personal_blog_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Aakriti Personal Blog, use a find and replace
	 * to change 'aakriti-personal-blog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'aakriti-personal-blog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
        
        // This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
        
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );	
	set_post_thumbnail_size( 900, 400, true );   

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(		
		'main-menu' 	=> esc_html__( 'Main Menu', 'aakriti-personal-blog' ),		
		'footer-menu' 	=> esc_html__( 'Footer Menu', 'aakriti-personal-blog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aakriti_personal_blog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for custom logo.
	add_theme_support( 'custom-logo' );

	// Post format.
	add_theme_support( 'post-formats', array('video', 'audio', 'quote', 'gallery'));
	
	// WordPress 5.0 and Gutenberg support
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
		
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );	
	
}
add_action( 'after_setup_theme', 'aakriti_personal_blog_setup' );

/**
 * Admin Welcome Notice
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 */
function aakriti_personal_blog_admin_welcom_notice() {
	global $pagenow;

	if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
		echo '<div class="updated notice notice-success is-dismissible"><p>'.sprintf( __( 'Thank you for choosing Aakriti Personal Blog Blog Theme. To get started, visit our <a href="%s">welcome page</a>.', 'aakriti-personal-blog' ), esc_url( admin_url( 'themes.php?page=aakriti-personal-blog' ) ) ).'</p></div>';
	}
}
add_action( 'admin_notices', 'aakriti_personal_blog_admin_welcom_notice' );


/**
	* Register Sidebars
	* 
	* @package Aakriti Personal Blog
	* @since 1.0
	*/
	function aakriti_personal_blog_register_sidebar() {

		// Main Sidebar Area
		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'aakriti-personal-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears on posts and pages.', 'aakriti-personal-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
		
		

		// Footer Sidebar Area
		register_sidebar( array(
			'name'          => esc_html__( 'Footer', 'aakriti-personal-blog' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Footer Widhet Area : Add widgets here.', 'aakriti-personal-blog' ),
			'before_widget' => '<section id="%1$s" class="widget aakriti-personal-blog-columns '. aakriti_personal_blog_footer_widgets_cls( 'footer' ) .' %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));

		// Footer Instgarm Widget Area
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Instgarm Widget Area', 'aakriti-personal-blog' ),
			'id'            => 'aakriti-personal-blog-intsgram-feed',
			'description'   => esc_html__( 'Add widgets here.', 'aakriti-personal-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	}
	// Action to register sidebar
		
	add_action( 'widgets_init', 'aakriti_personal_blog_register_sidebar' );
	
if ( ! function_exists( 'aakriti_personal_blog_fonts_url' ) ) {
/**
 * Register Google fonts for Aakriti Personal Blog.
 * Create your own aakriti_personal_blog_fonts_url() function to override in a child theme.
 * @return string Google fonts URL for the theme.
 */
function aakriti_personal_blog_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'aakriti-personal-blog' ) ) {
		$fonts[] = 'Poppins:400,500,700';
	}
	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'aakriti-personal-blog' ) ) {
		$fonts[] = 'Roboto:400,500';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
}	
/**
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 */
function aakriti_personal_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'aakriti_personal_blog_pingback_header', 5 );

// Common Functions File
require_once AAKRITI_BLOG_DIR . '/includes/aakriti-personal-blog-functions.php';

// Custom template tags for this theme
require_once AAKRITI_BLOG_DIR . '/includes/template-tags.php';

// Theme Customizer Settings
require_once AAKRITI_BLOG_DIR . '/includes/customizer.php';

// Script Class
require_once( AAKRITI_BLOG_DIR . '/includes/class-aakriti-personal-blog-script.php' );

// Theme Dynemic CSS
require_once( AAKRITI_BLOG_DIR . '/includes/aakriti-personal-blog-theme-css.php' );

/**
 * Load tab dashboard
 */
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require get_template_directory() . '/includes/dashboard/aakriti-personal-blog-how-it-work.php';
    
}

/************Category image Module Module End******************/

// Plugin recomendation class
require_once( AAKRITI_BLOG_DIR . '/includes/plugins/class-wpcrt-recommendation.php' );