<?php
/**
 * Components functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Clean_Fotografie
 */

/**
 * Loads the child theme textdomain.
 */
function cleanfotografie_setup() {
    load_child_theme_textdomain( 'clean-fotografie', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cleanfotografie_setup' );


/**
 * Enqueue scripts and styles.
 */
function cleanfotografie_scripts() {
	/* If using a child theme, auto-load the parent theme style. */
	if ( is_child_theme() ) {
		wp_enqueue_style( 'fotografie-style', trailingslashit( esc_url( get_template_directory_uri() ) ) . 'style.css' );
	}

	/* Always load active theme's style.css. */
	wp_enqueue_style( 'cleanfotografie-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cleanfotografie-global', get_stylesheet_directory_uri() . '/assets/js/global.min.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'cleanfotografie_scripts' );

/**
 * Prints HTML with meta information for the categories.
 */
function cleanfotografie_entry_categories() {
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', 'clean-fotografie' ) );
	if ( $categories_list && fotografie_categorized_blog() ) {
		echo '<span class="cat-links"><span class="screen-reader-text">' . esc_html__( 'Categories: ', 'clean-fotografie' ) . '</span>' . $categories_list . '</span>'; // WPCS: XSS OK.
	}
}


/**
 * Prints HTML with meta information for the author.
 */
function cleanfotografie_entry_author() {
	$byline = sprintf(
		/* translators: used between spans and before author */
		esc_html_x( '%1$sby%2$s%3$s', 'post author', 'clean-fotografie' ),
		'<span class="screen-reader-text">',
		' </span>',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.
}


/**
 * Prints HTML with meta information for the comment.
 */
function cleanfotografie_entry_comment() {
	echo '<span class="comments-link">';
	comments_popup_link( esc_html__( 'Leave a comment', 'clean-fotografie' ), esc_html__( '1 Comment', 'clean-fotografie' ), esc_html__( '% Comments', 'clean-fotografie' ) );
	echo '</span>';
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cleanfotografie_body_classes( $classes ) {
	// Add a class if there is a custom header.
	if ( has_header_image() && is_front_page() ) {
		$classes[] = 'has-header-image';
	}

	// Unset boxed-layout or fluid-layout
	if ( false !== ( $key = array_search( array( 'boxed-layout', 'fluid-layout' ) , $classes ) ) ) {
		unset( $classes[ $key ] );
	}

	// Adds a class of (full-width|box) to blogs.
	if ( 'boxed' === get_theme_mod( 'fotografie_layout_type' ) ) {
		$classes[] = 'boxed-layout';
	} else {
		$classes[] = 'fluid-layout';
	}

	return $classes;
}
add_filter( 'body_class', 'cleanfotografie_body_classes' );


if ( ! function_exists( 'cleanfotografie_header_media_text' ) ) :
	/**
	 * Display Header Media Text
	 * @return void
	 */
	function cleanfotografie_header_media_text() {
		$title    = get_theme_mod( 'cleanfotografie_header_media_title', esc_html__( 'Header Media', 'clean-fotografie' ) );
		$text     = get_theme_mod( 'cleanfotografie_header_media_text', esc_html__( 'This is Header Media Text.', 'clean-fotografie' ) );
		$url      = get_theme_mod( 'cleanfotografie_header_media_button_url', '#' );
		$url_text = get_theme_mod( 'cleanfotografie_header_media_button_text', esc_html__( 'Explore', 'clean-fotografie' ) );
		$base     = get_theme_mod( 'cleanfotografie_header_media_button_base' );
		$target   = '_self';

		if ( '' != $url ) {
			//support for qtranslate custom link
			if ( function_exists( 'qtrans_convertURL' ) ) {
				$url = qtrans_convertURL( $url );
			}

			//Checking Link Target
			if ( $base ) {
				$target = '_blank';
			}
		}

		if ( '' !== $title || '' !== $text || '' !== $url ) : ?>
			<div class="custom-header-content section header-media-section">
				<div class="custom-header-content-wrapper">
					<?php if ( '' !== $title ) : ?>
						<h2 class="entry-title section-title"><?php echo wp_kses_post( $title ); ?></h2>
					<?php endif; ?>

					<p class="site-header-text"><?php echo wp_kses_post( $text ); ?>

					<span class="header-button"><a href="<?php echo esc_url( $url ); ?>" target="<?php echo $target; // WPCS: XSS OK. ?>" class="button"><?php echo wp_kses_data( $url_text ); ?><span class="screen-reader-text"><?php echo wp_kses_post( $title ); ?></span></a></span>
				</div><!-- .custom-header-content-wrapper -->
			</div>
		<?php endif;
	}
endif; // cleanfotografie_header_media_text().

/**
 * Change Custom background default color
 * @param  array $params parent theme Custom Background parameters
 * @return array Modified child theme Custom Background Parameters
 */
function cleanfotografie_custom_background_parameters( $params ) {
	$params['default-color'] = '#1a1a1a';
	return $params;
}
add_filter( 'fotografie_custom_background_args', 'cleanfotografie_custom_background_parameters' );

/**
 * Change Custom header default color
 * @param  array $params parent theme Custom Background parameters
 * @return array Modified child theme Custom Background Parameters
 */
function cleanfotografie_custom_header_parameters( $params ) {
	$params['default-text-color'] = '#383838';
	return $params;
}
add_filter( 'fotografie_custom_header_args', 'cleanfotografie_custom_header_parameters' );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Clean Fotografie 0.1
 */
function cleanfotografie_widgets_init() {
	if ( class_exists( 'Catch_Instagram_Feed_Gallery_Widget' ) ||  class_exists( 'Catch_Instagram_Feed_Gallery_Widget_Pro' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Instagram', 'clean-fotografie' ),
			'id'            => 'sidebar-instagram',
			'description'   => esc_html__( 'Appears above footer. This sidebar is only for Widget from plugin Catch Instagram Feed Gallery Widget and Catch Instagram Feed Gallery Widget Pro', 'clean-fotografie' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>'
		) );
	}
}
add_action( 'widgets_init', 'cleanfotografie_widgets_init' );


/**
 * Load Customizer Options
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/customizer.php';

/**
 * Load Upgrade to pro button
 */
require trailingslashit( get_stylesheet_directory() ) . 'class-customize.php';

/**
 * Parent theme override functions
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/override-parent.php';
