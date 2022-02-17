<?php

/*
 * This is Bootstrap to WordPress theme called: WP Less is More.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * WP Less is More supports.
 *
 * @uses load_theme_textdomain() for translation/localization support.
 * @uses add_editor_style() to add Visual Editor stylesheets.
 * @uses add_theme_support() to add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() to add support for a navigation menu.
 * @uses set_post_thumbnail_size() to set a custom post thumbnail size.
 *
 * @since WP Less is More 1.0
 */


function wp_less_is_more__theme_setup() {

	/*
	 * Set the content width based on the theme's design and stylesheet.
	 */
		global $content_width;

		if ( ! isset( $content_width ) ) {
		$content_width = 692;
	}

	/*
	 * Makes WP Less is More available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on WP Less is More, use a find and
	 * replace to change 'wp-less-is-more' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'wp-less-is-more' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// This theme uses wp_nav_menu() in six locations.

		register_nav_menus( array (
		'top'	 => __( 'Top Menu', 	'wp-less-is-more'),
		'bottom' => __( 'Bottom Menu', 	'wp-less-is-more'),

		'w-sidebar-left' 		=> __( 'Left Bottom Widget Menu', 			'wp-less-is-more' ),
		'w-sidebar-middle-left'	=> __( 'Middle Left  Bottom Widget Menu', 	'wp-less-is-more' ),
		'w-sidebar-middle-right'=> __( 'Middle Right Bottom Widget Menu', 	'wp-less-is-more' ),
		'w-sidebar-right'		=> __( 'Right Bottom Widget Menu', 			'wp-less-is-more' ),
		));

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support for custom logo.
	 *
	 */

	 $defaults = array(
		'header-text'           => false,
		'random-default'		=> false,
		'width'					=> 700,
		'height'				=> 100,
		'flex-height'			=> false,
		'flex-width'			=> false,
		'uploads'				=> true,

	);
	add_theme_support( 'custom-header', $defaults );
	add_theme_support( 'custom-background', $args = array());

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( 'inc/bootstrap/css/editor-style.css' );

}
add_action( 'after_setup_theme', 'wp_less_is_more__theme_setup' );

	/*
	 * Customizer additions.
	 *
	 * @since WP Less is More 1.1.1
	 */

 require trailingslashit( get_template_directory() ) . 'inc/customizer/customizer.php';
 
	/*
	 * ** Define Dropdowns Bootstrap Menu **
	 *
	 * ** If you want to have dropdowns, bootstrtap menu, you have to:
	 * 	1) Register Custom Navigation Walker
	 * 	2) Replaces "current-menu-item" with "active"
	 * 	3) Deletes all CSS classes and id's, except for those listed in the @array
	 * 	4) Deletes empty classes and removes the sub menu class
	 *
	 * @since WP Less is More 1.0
	 **/

require trailingslashit( get_template_directory() ) . 'inc/bootstrap/wp_less_is_more_bootstrap_navwalker.php';


/** Filters **/

	/*
	 * Deletes all CSS classes and id's, except for those listed in the array below
	 **/

function wp_less_is_more__filter__custom_wp_nav_menu( $var ) {
		return is_array( $var ) ? array_intersect( $var, array(
				//List of allowed menu classes
				'current-menu-item',
				'current_page_item',
				'current_page_parent',
				'current_page_ancestor',
				'first',
				'last',
				'vertical',
				'horizontal'
				)
		) : '';
}

	/*
	 * Replaces "current-menu-item" with "active" - for bootstrap menu8
	 * @since WP Less is More 1.0
	 **/

function wp_less_is_more__filter__current_to_active( $text ){
		$replace = array(
			//List of menu item classes that should be changed to "active"
			'current-menu-item' 	=> 'active',
			'current_page_item' 	=> '1',
			'current_page_parent' 	=> '2',
			'current_page_ancestor' => '3',
		);
		$text = str_replace(array_keys( $replace ), $replace, $text );
			return $text;
		}

	/*
	 * Deletes empty classes and removes the sub menu class
	 *
	 * @since WP Less is More 1.0
	 **/

function wp_less_is_more__filter__strip_empty_classes( $menu ) {
    $menu = preg_replace( '/ class=""| class="sub-menu"/',' class="dropdown-menu"', $menu );
    return $menu;
}

add_filter ( 'nav_menu_css_class',  'wp_less_is_more__filter__custom_wp_nav_menu' );
add_filter ( 'nav_menu_item_id'	 ,	'wp_less_is_more__filter__custom_wp_nav_menu' );
add_filter ( 'page_css_class'	 , 	'wp_less_is_more__filter__custom_wp_nav_menu' );
add_filter ( 'wp_nav_menu'		 ,	'wp_less_is_more__filter__current_to_active'	 );
add_filter ( 'wp_nav_menu'		 ,	'wp_less_is_more__filter__strip_empty_classes');


	/*
	 * This function add img-responsive class within the_content included post_thumbnails.
	 * If you want to have responsive images outside the_content you have to add this class manually.
	 *
	 *  Responsive images:
	 * 	1) add img-responsive class
	 * 	2) remove dimensions
	 *
	 * @since WP Less is More 1.0
	 **/

function wp_less_is_more__filter__bootstrap_responsive_images( $html ){
  $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'

  // check if there are already classes assigned to the anchor
  if ( preg_match( '/<img.*? class="/', $html ) ) {

    $html = preg_replace( '/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html );

  } else {

    $html = preg_replace( '/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html );

  }

  // remove dimensions from images,, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );

  return $html;
}

	/*
	 * This function removes dimensions from post_thumbnails.
	 *
	 * @since WP Less is More 1.1.2
	 **/

function wp_less_is_more__filter__remove_width_and_height( $html, $post_id, $post_thumbnail_id, $size, $attr )
{
    $html = preg_replace( '/ (width|height)="[^"]+"/', '', $html );
    return $html;
}
add_filter( 'the_content',			'wp_less_is_more__filter__bootstrap_responsive_images', 10 );
add_filter( 'post_thumbnail_html',	'wp_less_is_more__filter__remove_width_and_height', 10, 5 );


	/** Excerpt lenght **
	 *
	 * By default the excerpt length is set to return 55 words.
	 * This filter is used to change excerpt lenght.
	 *
	 *
	 * @since WP Less is More 1.1.1
	 **/

function wp_less_is_more__filter__excerpt_length( $length ) {

	$_excerpt_length = wp_less_is_more__default_excerpt_length();
	$excerpt_length = get_theme_mod('excerpt_length', $_excerpt_length );

	if ( $excerpt_length == $_excerpt_length )
		return $_excerpt_length;
	else return $excerpt_length;
}
add_filter( 'excerpt_length', 'wp_less_is_more__filter__excerpt_length', 999 );


/** Actions **/

	/*
	 * Registers a widget area.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
	 *
		*
		* 	You've got four widgets area
		* 	1) on the left bottom side of the site
		* 	2) in the left middle - bottom
		* 	3) in the right bottom side
		*   4) on the right bottom side
		*
		* @since WP Less is More 1.0
		*
		**/

function wp_less_is_more__action__widgets_init() {
	register_sidebar( array(
		'name'			=> __( 'Left Bottom Widget Area', 'wp-less-is-more' ),
		'id'			=> 'sidebar-left',
		'description'	=> __( 'Appears on the left-bottom side of the page.', 'wp-less-is-more' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Middle Left  Bottom Widget Area', 'wp-less-is-more' ),
		'id'			=> 'sidebar-middle-left',
		'description'	=> __( 'Appears on the middle-bottom side of the page.', 'wp-less-is-more' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Middle Right Bottom Widget Area', 'wp-less-is-more' ),
		'id'			=> 'sidebar-middle-right',
		'description'	=> __( 'Appears on the right-bottom side of the page.', 'wp-less-is-more' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Right Bottom Widget Area', 'wp-less-is-more' ),
		'id'			=> 'sidebar-right',
		'description'	=> __( 'Appears on the right-bottom side of the page.', 'wp-less-is-more' ),
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	) );

}
add_action( 'widgets_init', 'wp_less_is_more__action__widgets_init' );


	/*
	 *  Enqueue scripts and styles.
	 *
	 * @since WP Less is More 1.0
	 */

function wp_less_is_more__action__enqueue_js_and_css() {

	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array( 'jquery' ), null, true );

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', false, null, 'all' );

	wp_enqueue_style( 'bootstrap-joombotron-narrow', get_stylesheet_directory_uri() . '/inc/bootstrap/css/jumbotron-narrow.css', false, null, 'all' );

	wp_enqueue_style( 'wp-less-is-more-style',	get_stylesheet_directory_uri() . '/style.css', false, null, 'all' );

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	*
	* HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
	*
	**/

	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/inc/bootstrap/js/html5shiv.min.js',   false, null, true );
	wp_enqueue_script( 'respond',	 get_template_directory_uri() . '/inc/bootstrap/js/respond.min.js',	false, null, true );

	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
    wp_script_add_data( 'respond',   'conditional', 'lt IE 9' );

		// @since WP Less is More 1.1.4

	// if ( 'on' == get_theme_mod('dereg_jq') ){

		// wp_deregister_script( 'jquery' );
		// wp_deregister_script( 'jquery-core' ); // do not forget this
		// wp_deregister_script( 'jquery-migrate' ); // do not forget this

		// wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		// wp_enqueue_script( 'jquery' );
	// }

	if ( 'on' == get_theme_mod ( 'move_to_footer', false ) ){
		remove_action('wp_head', 'wp_print_scripts');
		remove_action('wp_head', 'wp_enqueue_scripts', 1);
		remove_action('wp_head', 'wp_print_head_scripts', 9);


		add_action('wp_footer', 'wp_print_scripts', 5);
		add_action('wp_footer', 'wp_enqueue_scripts', 5);
		add_action('wp_footer', 'wp_print_head_scripts', 5);
	}

	if ( 'on' == get_theme_mod( 'disable_emoji' ) ){

	 // all actions related to emojis
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	}



}
add_action( 'wp_enqueue_scripts', 'wp_less_is_more__action__enqueue_js_and_css' );

	/*
	 * Enqueue script for custom customize control.
	 */

function wp_less_is_more__action__customize_enqueue_js() {
	wp_enqueue_script( 'wp-less-is-more-custom-customize', get_template_directory_uri() . '/inc/customizer/js/wp_less_is_more_show_if_checked.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'wp_less_is_more__action__customize_enqueue_js' );

	/*
	 * Action hook to prevent empty divisions
	 * This hook wraps comments form within div tags
	 * and prevents against emptiness (or white break) if comments are closed
	 * because you can't add custom class to default WordPress form tag
	 *
	 * @since WP Less is More 1.1.1
	 **/

function wp_less_is_more__action__comment_form_before(){

	echo '<div class="' . esc_attr( 'panel-body' ) . '" style="' . esc_attr( 'padding-top: 0px;' ) . '">';
}

function wp_less_is_more__action__comment_form_after(){

	echo '</div>';
}
add_action( 'comment_form_before', 'wp_less_is_more__action__comment_form_before', 10 );
add_action( 'comment_form_after', 'wp_less_is_more__action__comment_form_after', 10 );

	/*
	 * 	This function is replacement for:
	 *	@the_posts_pagination();
	 *	and is used on home.php template
	 *
	 * 	It shows nice and clear posts pagination tailored to Bootstrap Theme
	 *
	 * @since WP Less is More 1.0
	 **/

function wp_less_is_more__numeric_posts_nav() {
	global $wp_query;

	if( is_singular() )
		return;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 2;

		// (un)comment this condition, if you want to have more pages in array
		if ( $paged != 3 ) { $links[] = $paged - 3; }
	}

	if ( ( $paged + 2 ) <= $max ) {

		// (un)comment this condition, if you want to have more pages in array
		if ( ( $paged + 2 ) != $max ) { $links[] = $paged + 3; }
		
		$links[] = $paged + 2;
	}

	echo '<nav class="text-center"><ul class="pagination">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo "\n";
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( ( array ) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );

	echo '</ul></nav>' . "\n";

}

	/*
	 *  Custom template for comments list
	 **/

function wp_less_is_more__custom_comments_list_template( $comment, $args, $depth ) {
	global $comment_depth;

	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag 		= 'div';
		$add_below 	= 'div-comment';
	} else {
		$tag 		= 'li';
		$add_below 	= 'comment';
	}


?>
	<<?php echo $tag ?> style="list-style-type: none;" <?php comment_class( empty( $args['has_children'] ) ? 'alone' : 'this parent' ) ?> id="comment-<?php comment_ID(); ?>">

	<div class="media-left">
	<?php if ( $args['avatar_size'] != 0 ) 	echo get_avatar( $comment,  $args['avatar_size'], '', '', $arg = array( 'class' => '' ) ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'wp-less-is-more' ); ?></em>
		<br />
	<?php endif; ?>

<div class="media-body">
	<h4 class="media-heading">
	<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>', 'wp-less-is-more' ), get_comment_author_link() ); ?></h4>

	<?php comment_text();

	comment_reply_link( array_merge( $args, array(

		'add_below'	=> $add_below,
		'depth'		=> $depth,
		'max_depth'	=> $args['max_depth'],
		'reply_text'=> __( 'Reply', 'wp-less-is-more' ) . '&nbsp;<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>',
		'before'	=> '<p>',
		'after'		=> '</p>'

		) ) ); ?>

</div>

<?php
}


	/*
	 * Custom Link Pages
	 * @author toscha
	 * @link http://wordpress.stackexchange.com/questions/14406/how-to-style-current-page-number-wp-link-pages
	 * @param  array $args
	 * @return void
	 * Modification of wp_link_pages() with an extra element to highlight the current page.
	 * Edited by: WPSolucje
	 * We added only 2 extra params: @current_before and @current_after
	 * Enjoy!
	 *
	 * @since WP Less is More 1.0
	 */

function wp_less_is_more__bootstrap_link_pages( $args = array () ) {
	global $page, $numpages, $multipage, $more, $pagenow;

	$defaults = array(
		'before'		=> '',
		'after'			=> '',
		'before_link'	=> '',
		'after_link'	=> '',
		'current_before'=> '',
		'current_after'	=> '',
		'link_before'	=> '',
		'link_after'	=> '',
		'pagelink'		=> '%',
		'separator'		=> ' ',
		'echo'			=> 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	if ( ! $multipage )
	{
		return;
	}
	$output = $before;
	for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
	{
		$j = str_replace( '%', $i, $pagelink );

	$output .= ( 1 === $i ) ? ' ' : "{$separator}";
		if ( $i != $page || ( ! $more && 1 == $page ) )
		{
			$output .= "{$before_link}" . _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a>{$after_link}";
		}
		else
		{
			$output .= "{$current_before}{$j}{$current_after}";
		}

	}
	print $output . $after;
}

	/*
	 * ** Custom Site Title **
	 *
	 * This function changes the way you see (in header section)
	 * your site tile (or blog name), depends on different pages
	 * See line: 27 in header.php file
	 *
	 * @since WP Less is More 1.1.0.8
	 **/

function wp_less_is_more__site_title(){

	// if there is attachment page display: Attachment
	if ( is_attachment() ) {

		$site_title =  __( 'Attachment', 'wp-less-is-more');
	}
		// if there is author page display: Author + author name
		elseif ( is_author()   ) {

			$site_title =  __( 'Author:', 'wp-less-is-more') . ' ' . get_the_author();
		}
			// if there is archive display: Archive
			elseif ( is_archive()  ) {

				$site_title =  __( 'Archive', 'wp-less-is-more');
			}

				// if there is custom page templete used display page title
				elseif( is_page_template( 'page_list-child-pages.php' ) ) {

					$site_title =  the_title();
				}
					// in other any cases display hyperlinked blog name
					else {

						$site_title =  get_bloginfo( 'name' );
					}
	echo $site_title;
}

	/* Taxonomy Title
	 *
	 * This function shows the single taxonomy title - styled as breadcrumb - on archive page
	 *
	 * @since WP Less is More 1.1.4
	 */

function wp_less_is_more__taxonomy_title(){

	$tag = 	single_tag_title( '', false );
	if ( is_tag() || is_category() ) {

	$output = '<ol class="breadcrumb">';
	$output .= '<li class="active">';

		if ( is_tag() ) {

		 $output .= __( 'Posts tagged with' , 'wp-less-is-more' );
		}

		if ( is_category() ) {

		$output .= __( 'Posts in category', 'wp-less-is-more' );
		}

	$output .= '</li>';
	$output .= '<li><a href="#">' . $tag . '</a></li>
	</ol>';

	return $output;

	}


}

	/**
	 *
	 ** Cutom Footer Text
	 *
	 * @since WP Less is More 1.1.1
	 */

function wp_less_is_more__custom_footer_text(){
	/*
	 * let's get data from database once only
	 */
	$custom_footer_text = get_theme_mod( 'custom_footer_text' );
	$display_footer_text = get_theme_mod( 'display_footer_text', 1 );
	// if checkbox is checked
	if ( $display_footer_text )

		//if input field is empty
		if ( $custom_footer_text == '' )

			// print default
			echo wp_less_is_more__default_footer_text();

		// else print custom
		else echo $custom_footer_text;
}


/*
 * Collapse in/out comment list
 *
 * This function handle collapse behavior to create an accordion comment list
 *
 * @param int 		$max_page 	The maximum number of comment pages.
 * @param int 		$page 		Check for current page number.
 * @param string 	$default	Determine which page is displayed by default.
 * 								There are two options: 'newest' and 'oldest'.
 *
 *
 *	Comments are collapse if:
 *
 *	- pagination is @off
 *  - @param $page is the first page in pagination queue
 *  - or equal to maximum number of comment pages
 *  	*) when @newest $max_page == $page
 *  	**) when @oldest $page == 1
 *
 *	Comments are collapse in if:
 *	- pagination is @on and @param $page in not the firt one in pagination queue
 *	- $param $replytocom is true
 *
 *	Then from the given data you need to decide whether comments can collapse in or not.
 *	By @default comments are collapsed.
 *
 * @since WP_Less_is_More 1.1.1
 **/

function wp_less_is_more__collapse_comments_list(){
	// If have comments, do action
	if ( have_comments() ) {

		$in = '';

		$max_page = get_comment_pages_count();
		$page = ( $max_page == 1 ) ? 1 : get_query_var( 'cpage' );
		$default = get_option( 'default_comments_page' );

		if ( true == get_option( 'page_comments' ) ){

			switch ( $default ){

				case 'newest':
					// 5 : 5
					$in = ( $page == $max_page ) ? '' : 'in';
				break;

				case 'oldest':
					// 5:1
					$in = ( $page == 1 ) ? '' : 'in';
				break;
			}

		} else {

			$in = '';
		}

		if ( isset( $_GET['replytocom'] ) ) {
			$in = 'in';
		}

		return $in;
	}
}

	/*
	 * This is a post summary info appears at the bottom of the post but
	 * over comments section
	 * You can choose betwen text and icons
	 * (see in customizer)
	 *
	 * @since: WP Less is More 1.1.4
	 */


function wp_less_is_more__entry_meta(){

	if( get_theme_mod( 'entry_meta' ) ){

	if( has_tag() ) { ?>
<p title="<?php esc_attr_e( 'hashtags - tags - keywords', 'wp-less-is-more' ); ?>"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span><span class="sr-only"><?php _e( 'Tagged with:', 'wp-less-is-more' ); ?></span>&ensp;<?php the_tags( '', ', ', '' ); ?></p><?php } ?>

<p class="post_author vcard author post_date post_modified_dat">
<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
<span class="sr-only"><?php _e( 'Written by', 'wp-less-is-more' ); ?></span>
<span class="fn" title="<?php esc_attr_e( 'Written by', 'wp-less-is-more' ); ?>"><?php the_author_link() ?></span>&emsp;

<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
<span class="sr-only"><?php _e( 'Published', 'wp-less-is-more' ); ?></span>
<time class="entry-date updated" title="<?php esc_attr_e( 'Published', 'wp-less-is-more' ); ?>"><?php the_date(); ?></time>&emsp;

<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
<span class="sr-only"><?php _e( 'Last update', 'wp-less-is-more' ); ?></span>
<time class="entry-date updated" title="<?php esc_attr_e( 'Last update', 'wp-less-is-more' ); ?>"><?php the_modified_date(); ?></time>&emsp;

<span class="text-right glyphicon glyphicon-folder-open" aria-hidden="true" title=" <?php esc_attr_e( 'Category', 'wp-less-is-more' ); ?>"></span>
<span class="sr-only"><?php _e( 'Category', 'wp-less-is-more' ); ?></span>&ensp;<span class="category"  title=" <?php esc_attr_e( 'Category', 'wp-less-is-more' ); ?>"><?php the_category( '&ensp;&#x2010;&ensp;' ); ?></span></p>

	<?php } else {

?><p><?php the_tags( __( 'Tagged with:&nbsp;', 'wp-less-is-more' ), ', ', '<br />' ); ?></p>
<p><?php _e( 'Category:&nbsp;', 'wp-less-is-more' ); the_category( ' | ' ); ?></p>
<p class="post_author vcard author post_date post_modified_date"><?php _e( 'Written by:&nbsp;', 'wp-less-is-more' ); ?><span class="fn"><?php the_author_link(); ?></span> &diams; <?php _e( 'Published:', 'wp-less-is-more' ); ?> <time class="entry-date updated"><?php the_date(); ?></time> &diams; <?php _e( 'Last update:', 'wp-less-is-more' ); ?> <time class="entry-date updated"><?php the_modified_date(); ?></time></p>
<?php }

}

	/*
	 * WP Less is More Contact Form
	 *
	 * This is realy simply contact form for your convinient use.
	 * No need to install aditional contact form plugins.
	 * That's what every theme supposed to have as a default feature.
	 *
	 * To render contact form on your site, simple create new page with this {contact-form} slug
	 * or just create new page with any other name and choose @ Contact form template @ from the list.
	 *
	 * See: https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-a-custom-page-template-for-one-specific-page
	 *
	 * The contact form appears under the content of the page so that this content can be used as an additional space for information.
	 *
	 * @since: WP Less is More 1.1.4
	 */


function wp_less_is_more__contact_form(){

## We are protecting against an empty index like: Undefined variable: $variable

$name=$email=$message=$nErr=$eErr=$mErr=$cErr=$nNotice=$eNotice=$mNotice=$cNotice=$tNotice=$ERROR=$captcha=$displayErrors=$remove_form=false;


## We check whether the data has been sent

if ( isset( $_POST['wp_less_is_more_submit_contact_form'] ) && ( $_POST['wp_less_is_more_submit_contact_form'] == 'wp_less_is_more_contact_form_message' )) {

		# First, check nonce

		if ( ! isset( $_POST['wp_less_is_more_nonce_field'] ) || ! wp_verify_nonce( $_POST['wp_less_is_more_nonce_field'], 'wp_less_is_more_nonce_contact_form_message' )) {

		   print '<div class="alert alert-danger" role="alert">' . __( 'Sorry, but <strong>something went wrong.</strong> Your nonce did not verify. Contact with admin.', 'wp-less-is-more' ) . '</div>';
		   return;
		}

		/*  If nocne is ok, then execute next steps */

		## chceck message field

		if ( empty( $_POST['wp_less_is_more_message'] ))
		{
			$mNotice = '<li>' . __( 'write a message', 'wp-less-is-more' ) . "</li> \r\n";
			$mErr = '<span class="label label-danger">* !</span> ' . __( 'Message is required', 'wp-less-is-more' );
			$ERROR = true;
		} else 	{

			$message = sanitize_textarea_field ( $_POST['wp_less_is_more_message'] );
		}

		## chceck email

		if ( empty( $_POST['wp_less_is_more_email'] ))
		{
			$eNotice = '<li>' . __( 'enter your email address', 'wp-less-is-more' ) . "</li> \r\n";
			$eErr = '<span class="label label-danger">* !</span> ' . __( 'Email is required', 'wp-less-is-more' );
			$ERROR = true;

		} else {

			$email = sanitize_email ( $_POST['wp_less_is_more_email'] );

			# check if e-mail address is well-formed
			if ( !filter_var( $email, FILTER_VALIDATE_EMAIL))
			{
				$eNotice = '<li>' . __( 'the email address is not valid' , 'wp-less-is-more' ) . "</li> \r\n";
				$eErr = '<span class="label label-danger">* !</span> ' . __( 'Email not valid', 'wp-less-is-more' );
				$ERROR = true;
			}
		}

		## chceck name

		if ( empty( $_POST['wp_less_is_more_name'] ))
		{
			$nNotice = '<li>' . __( 'enter your name', 'wp-less-is-more' ) . "</li> \r\n";
			$nErr = '<span class="label label-danger">* !</span> ' . __( 'Name is required', 'wp-less-is-more' );
			$ERROR = true;
		} else 	{

			$name = sanitize_text_field ( $_POST['wp_less_is_more_name'] );
		}

		## chceck captcha math

		$_pre_captcha = ( $_POST['wp_less_is_more__pre_captcha'] );

		if ( empty( $_POST['wp_less_is_more_captcha'] ))
		{
			$cNotice = '<li>' . __( 'solve the mathematical operation', 'wp-less-is-more' ) . "</li> \r\n";
			$cErr = '<span class="label label-danger">* * !</span> <strong class="control-label">' . __( 'Mathematics mandatory', 'wp-less-is-more' ) . '</strong>';
			$ERROR = true;
		} else 	{

			$captcha =  (int) $_POST['wp_less_is_more_captcha'] ;
			$hashed_captcha = md5 ( $captcha );

			if ( $_pre_captcha != $hashed_captcha || $captcha > 18 || $captcha < -8 || $captcha === 0  )
			{
				$cNotice = '<li>' . __( 'the result does not match', 'wp-less-is-more' ) . "</li> \r\n";
				$cErr = '<span class="label label-danger">* * !</span> <strong class="control-label">' . __( 'Incorrect result!', 'wp-less-is-more' ) . '</strong>';
				$ERROR = true;
			}
		}

		# Spam bots and crawlers protection

		/* If send time is less than actual time minus 6s, it SPAM! */

		if ( $_POST['wp_less_is_more_time'] >= ( time() - 6 ) ){

			$tNotice = '<span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
			<span class="sr-only">' . __( '(Error:)', 'wp-less-is-more' ) . '</span> ' . __( 'You push the button too fast. Now you have to wait at least <span id="count">7</span> seconds.', 'wp-less-is-more' ) . '<hr/>';
			$ERROR = true;

		}

		/* If all data has been entered correctly, send a message */

		if ( !$ERROR ) {

			## Prepare pre data

				$admin_email = get_option( 'admin_email' );
				$site_name = get_bloginfo( 'name' );
				$subject = sprintf( __( 'Message from the %s site ', 'wp-less-is-more' ), $site_name );
				$headers = array(
								'Content-Type: text/plain; charset=UTF-8',
								'From: ' . $name . ' <' . $email . '>',
								'Reply-To: ' .  $name . ' <' . $email . '>'
								);

				/*
				 * ** Copy of the original message **
				 *
				 * This message goes to sender (user who created it)
				 * if he checked the checkbox
				 *
				 */

				if ( isset ( $_POST['wp_less_is_more_copy'] ) && 'on' == $_POST['wp_less_is_more_copy'] ){

				$subject = 	sprintf( __( 'Copy of the message from %s', 'wp-less-is-more' ), $site_name );
				$headers = array(
								'Content-Type: text/plain; charset=UTF-8',
								'From: ' . $site_name . ' <' . $admin_email . '>',
								'Reply-To: ' .  $site_name . ' <' . $admin_email . '>'
								);

					wp_mail( $email, $subject, $message, $headers );
				}

			$remove_form = true;

			$displayErrors = '<div id="form" class="alert alert-success" role="alert">' . __( '<strong>Well done!</strong> You have successfully send this important message to me.', 'wp-less-is-more' ) .
			'<p>' . __( 'If you do not see a copy of the message in the <mark>Inbox</mark>, check the <mark>Spam</mark> folder.', 'wp-less-is-more' ) . '</p></div>';

		} else {

		## But if something went wrong, display the error message:

			$displayErrors = '<div id="form" class="alert alert-danger text-left" role="alert">
			' . $tNotice . '
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">' . __( '(Error:)', 'wp-less-is-more' ) . '</span> ' . __( 'Correct the form', 'wp-less-is-more' ) . '
			<ul>
			' . $mNotice . $nNotice . $eNotice. $cNotice . '
			</ul>

			</div>';

			$ERROR = true;
			$remove_form = false;

		} #end of the error message

} # end of the statment submint

	echo $displayErrors;

	if ( !$remove_form ){

	# Spam bots and crawlers protection

	$a = mt_rand( 1, 9 );
	$b = mt_rand( 1, 9 );

	if( mt_rand( 0, 1 ) === 1 ) {
		$sum = $a + $b;
		$sign = " + ";
	} elseif  ( ( $a - $b ) === 0 ) {
		$sum = ++$a - $b;
		$sign = " - ";
	} else {
		$sum = $a - $b;
		$sign = " - ";
	}

	## Hash sum before send with POST

	$_pre_captcha = md5 ( $sum );
?>
<div class="panel panel-info">

<div class="panel-heading"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?php _e( 'Contact form', 'wp-less-is-more' ); ?> </div>

<div class="panel-body">

<form class="form-horizontal" method="POST" action="#form">

<?php wp_nonce_field( 'wp_less_is_more_nonce_contact_form_message', 'wp_less_is_more_nonce_field' ); ?>

  <div class="form-group <?php echo ( $message ? ( $mErr ? ' has-error has-feedback' : '  has-success has-feedback' ) : ( $mErr ? ' has-error has-feedback' : '' ) ); ?>">
    <label for="message" class="col-sm-4 control-label"><?php echo ( $mErr ? $mErr : __( '* Message:', 'wp-less-is-more' ) ); ?></label>
  	<?php echo ( $ERROR ? ( $mErr ? '<span class="sr-only">' . __( '(Error:)', 'wp-less-is-more' ) . '</span>' : '<span class="sr-only">' . __( '(ok)', 'wp-less-is-more' ) . '</span>' ) : '' ); ?>
    <div class="col-sm-8">

	<?php echo ( $ERROR ? ( $mErr ? '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>' ) : '' ); ?>
		<textarea id="message" name="wp_less_is_more_message" class="form-control" rows="6" placeholder="<?php esc_attr_e( 'message', 'wp-less-is-more' ); ?>"><?php echo $message; ?></textarea>
	</div>
  </div>

  <div class="form-group  <?php echo ( $email ? ( $eErr ? ' has-error has-feedback' : '  has-success has-feedback' ) : ( $eErr ? ' has-error has-feedback' : '' ) ); ?>">
    <label for="email" class="col-sm-4 control-label"><?php echo ( $eErr ? $eErr : __( '* Email:', 'wp-less-is-more' ) ); ?></label>
  	<?php echo ( $ERROR ? ( $eErr ? '<span class="sr-only">' . __( '(Error:)', 'wp-less-is-more' ) . '</span>' : '<span class="sr-only">' . __( '(ok)', 'wp-less-is-more' ) . '</span>' ) : '' ); ?>

    <div class="col-sm-4">
	<?php echo ( $ERROR ? ( $eErr ? '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>' ) : '' ); ?>
      <input type="email" name="wp_less_is_more_email" value="<?php echo esc_attr( $email ); ?>" class="form-control" id="email" placeholder="<?php esc_attr_e( 'email', 'wp-less-is-more' ); ?>">
    </div>
  </div>

  <div class="form-group  <?php echo ( $name ? ( $nErr ? ' has-error has-feedback' : '  has-success has-feedback' ) : ( $nErr ? ' has-error has-feedback' : '' ) ); ?>">
    <label for="name" class="col-sm-4 control-label"><?php echo ( $nErr ? $nErr : __( '* Name and surname:', 'wp-less-is-more' ) ); ?></label>
  	<?php echo ( $ERROR ? ( $nErr ? '<span class="sr-only">' . __( '(Error:)', 'wp-less-is-more' ) . '</span>' : '<span class="sr-only">' . __( '(ok)', 'wp-less-is-more' ) . '</span>' ) : '' ); ?>

    <div class="col-sm-4">
	<?php echo ( $ERROR ? ( $nErr ? '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>' ) : '' ); ?>
      <input type="text" name="wp_less_is_more_name" value="<?php echo esc_attr( $name ); ?>" class="form-control" id="name" placeholder="<?php esc_attr_e( 'name and surname', 'wp-less-is-more' ); ?>">
	</div>
  </div>

  <div class="form-group  <?php echo ( $captcha ? ( $cErr ? ' has-error has-feedback' : '' ) : ( $cErr ? ' has-error has-feedback' : '' ) ); ?>">
    <label for="captcha" class="col-sm-4 control-label">
	<?php echo $a . $sign . $b; ?> = ?
	</label>
    <div class="col-sm-4">
	  <?php echo ( $ERROR ? ( $cErr ? '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>' : '' ) : '' ); ?>
	<input type="hidden" name="wp_less_is_more__pre_captcha" value="<?php echo esc_attr( $_pre_captcha ); ?>">
	<input type="hidden" name="wp_less_is_more_time" value="<?php echo esc_attr( time() ); ?>">

	<input type="text" name="wp_less_is_more_captcha" class="form-control" id="captcha" placeholder="<?php esc_attr_e( 'solve the equation', 'wp-less-is-more' ); ?>">

	  <?php echo ( $ERROR ? ( $cErr ? '<span class="sr-only">' . __( '(Error:)', 'wp-less-is-more' ) . '</span>' : '' ) : '' ); ?>
	  <?php echo ( $cErr ? $cErr : __( '* Enter the result of the action.', 'wp-less-is-more' ) ); ?>

    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <div class="checkbox">
	  <p><label for="checkbox"><input type="checkbox" name="wp_less_is_more_copy" id="checkbox" checked="checked"> <?php _e( 'I want to receive a copy of this message', 'wp-less-is-more' ); ?>
        </label></p>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="wp_less_is_more_submit_contact_form" name="wp_less_is_more_submit_contact_form" class="btn btn-default active" value="wp_less_is_more_contact_form_message"><?php _e( 'Send message', 'wp-less-is-more' ); ?></button>
    </div>
  </div>
</form>

</div>
</div>

<?php }

}