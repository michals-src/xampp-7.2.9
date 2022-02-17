<?php
/**
 * WP Less is More Theme Customizer functionality
 *
 * @package WordPress
 * @subpackage WP Less is More
 * @since WP Less is More 1.1.1
 */

## firt let's define some custom sanitize functions 

function wp_less_is_more__sanitize_text( $text ){
	
	$allowed_html = array(
		'a' => array(
			'href' => array(),
		),
		'br' => array(),
		'del' => array (
			'datetime' => array(),
		),	
		'em' => array(),
		'i' => array(),
		'q' => array(
			'cite' => array(),
		),
		's' => array(),
		'strike' => array(),
		'strong' => array(),
	);

	$text = wp_kses( $text, $allowed_html );

	return  $text;	
}

function wp_less_is_more__sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function wp_less_is_more__sanitize_numbers( $number ) {
	// number check.
	return absint( $number );
}

/** Default footer text **/

function wp_less_is_more__default_footer_text(){
	$default_footer_text = sprintf( esc_html__( 'Copyright &copy; by %s', 'wp-less-is-more' ), get_bloginfo( 'name' ) );	
	return $default_footer_text;
}

/** Default excerpt length **/

function wp_less_is_more__default_excerpt_length(){
	return 55;
}



## Then register theme customizer

function wp_less_is_more__theme_customize( $wp_customize ) {
		
	/*
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}
	
		/* Read Me Section
		 *
		 * @since: WP Less is More 1.1.4
		 */
	
		class WP_Less_is_More_Read_Me extends WP_Customize_Control {
		public function render_content() {
			?>
			<div class="wp-less-is-more-read-me">
			
				<h3><?php printf( __( 'Thank you for using the <a href="%s" target="_blank">WP Less is More</a> theme.', 'wp-less-is-more' ), esc_url( 'https://wordpress.org/themes/wp-less-is-more/' )); ?></h3>
				<hr/>
				
				<h3><?php esc_html_e( 'Support', 'wp-less-is-more' ); ?></h3>				
				<p><?php esc_html_e( 'If there is something you don\'t understand, please use the support forum.', 'wp-less-is-more' ); ?></p>
				<p><?php printf( __( '<a href="%s" target="_blank">Support Forum</a>', 'wp-less-is-more' ), esc_url( 'https://wordpress.org/support/theme/wp-less-is-more' ) ); ?></p>
				
				<hr/>
				
				<h3><?php esc_html_e( 'Review', 'wp-less-is-more' ); ?></h3>
				<p><?php esc_html_e( 'If you are satisfied with the theme, we would greatly appreciate if you would review it.', 'wp-less-is-more' ); ?></p>
				<p><?php printf( __( '<a href="%s" target="_blank">Review This Theme</a>', 'wp-less-is-more' ), esc_url( 'https://wordpress.org/support/view/theme-reviews/wp-less-is-more?filter=5' ) ); ?></p>
				
				<hr/>
				
				<p><?php printf( __( 'If you are interested in making any major changes or looking for paid help, please e-mail us on: <a href="%s" target="_blank">this site</a>.', 'wp-less-is-more' ), esc_url( 'https://wpsolucje.pl/kontakt/' ) ); ?></a></p>

				<hr/>
				
				<p><?php printf( __( 'If you want to beautify your theme using the ready-made CSS, HTML and JS components, go to the official <a href="%s" target=_blank">Bootstrap 3 Documentation</a> site.', 'wp-less-is-more' ), esc_url( 'https://getbootstrap.com/docs/3.3/components/' ) ); ?>
				
				<hr/>
				
				<h3><?php esc_html_e( 'More improvements soon! :)', 'wp-less-is-more' ); ?></h3>
				
			</div>			
			<?php
		}
	}

	/******************************************
	 *                                        *
	 *      READ ME FIRST - whole option      *
	 *                                        *
	 ******************************************
	 */
	$wp_customize->add_section( 'wp_less_is_more_read_me', array(
		'title'    => __( 'Read Me First', 'wp-less-is-more' ),
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'wp_less_is_more_read_me_text', array(
		'default'           => '',
		'sanitize_callback' => 'wp_less_is_more__sanitize_checkbox',
	) );
	$wp_customize->add_control( new WP_Less_is_More_Read_Me( $wp_customize, 'wp_less_is_more_read_me_text', array(
		'section'  => 'wp_less_is_more_read_me',
		'priority' => 1,
	) ) );
	

	/******************************************
	 *                                        *
	 *      Option One - Custom Footer        *
	 *                                        *
	 ******************************************
	 */
	
	$wp_customize->add_section( 
		'wp_less_is_more_custom_footer_section',
		array(
			'title'      => __( 'Custom footer','wp-less-is-more' ),
			'description'	=> sprintf( __( 'Use this option to be able to control the footer text. It is enabled by default and looks like this: <strong><i>%s</i></strong>',  'wp-less-is-more' ), wp_less_is_more__default_footer_text() ),

	) );
	
	
	/******************************************
	 *                                        *
	 *      Option Two - Excerpt Lenght       *
	 *                                        *
	 ******************************************
	 */
	 
	$wp_customize->add_section( 
		'wp_less_is_more_excerpt_length_section',
		array(
			'title'      => __( 'Excerpt lenght','wp-less-is-more' ),
			'description'	=> sprintf( __( 'Use this option to control the excerpt lenght on the home page.
The default length is 55 words. This setting works only when a post themplate use <code>%s</code> template tag and the excerpt is created automatically (excerpt meta box on the post editor screen is empty) but no longer than the <code>%s</code> tag (if it\'s used).
See: <a href="%s" target="_blank">Excerpt</a> or <a href="%s" target="_blank">Customizing_the_Read_More</a> in codex.', 'wp-less-is-more'),
			esc_html__( 'the_excerpt', 'wp-less-is-more' ),
			esc_html__( '&lt;!--more--&gt;', 'wp-less-is-more'  ),
			esc_url('https://codex.wordpress.org/Excerpt' ),
			esc_url('https://codex.wordpress.org/Customizing_the_Read_More' ))

	) );

	/******************************************
	 *                                        *
	 *      Option Three - Speed Up Clean Up!            *
	 *                                        *
	 ******************************************
	 */
	 
	$wp_customize->add_section( 
		'wp_less_is_more_speed_up',
		array(
			'title'      => __( 'Speed up - Clean Up!','wp-less-is-more' ),
			'description'	=> sprintf( __( 'Technically speeking, you can speed up your page by moving some scripts to footer or even get rid of them from the queue. <hr/> If something goes wrong, uncheck these settings.', 'wp-less-is-more' ) ),
	) );

	/******************************************
	 *                                        *
	 *      Option Four - Entry Meta          *
	 *                                        *
	 ******************************************
	 */
	 
	$wp_customize->add_section( 
		'wp_less_is_more_entry_meta',
		array(
			'title'      => __( 'Entry Meta','wp-less-is-more' ),
			'description'	=> __( 'Change the way you see the post meta data section.', 'wp-less-is-more' ),
	) );
	
	/******************************************
	 *                                        *
	 *               Settings                 *
	 *                                        *
	 ******************************************
	 */
	
	/* 
	 * Footer Text 
	 *
	 * Return Values:
	 * (boolean) 
	 * True on success, false on failure.
	 *
	 **/
	
	$wp_customize->add_setting(
		// $id
		'display_footer_text',
		// $args
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_less_is_more__sanitize_checkbox'
		)
	);
	
	/*
	 * Custom Footer Text 
	 *
	 * Return Values:
	 * (string) 
	 * Value set for the option
	 *
	 **/
	
	$wp_customize->add_setting(
		'custom_footer_text',
		array(
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'wp_less_is_more__sanitize_text'
		)
	);

	/*
	 * Excerpt lenght
	 *
	 * Return Values:
	 * (int) 
	 * A non-negative integer.
	 *
	 **/

	$wp_customize->add_setting(
		'excerpt_length',
		array(
			'default' => wp_less_is_more__default_excerpt_length(),
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'wp_less_is_more__sanitize_numbers',
		)
	);

	/*
	 * Let's Speed Up Your Site! Shall we?
	 *
	 * Deregister unnessesery jQuery Core and Migrate scripts
	 *
	 * Return Values:
	 * (boolean) 
	 * True on success, false on failure.
	 *
	 **/

	 ## This is not alowed by ThemeChceck so I leave this commented.
	 
	// $wp_customize->add_setting(
		// 'dereg_jq',
		// array(
			// 'capability'     => 'edit_theme_options',
			// 'type'           => 'theme_mod',
			// 'sanitize_callback' => 'wp_less_is_more__sanitize_checkbox',
		// )
	// );

	/*
	 * Move whole head sripts to footer
	 *
	 * Return Values:
	 * (boolean) 
	 * True on success, false on failure.
	 *
	 **/

	$wp_customize->add_setting(
		'move_to_footer',
		array(
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'wp_less_is_more__sanitize_checkbox',
		)
	);

	/*
	 * Disable emoticons
	 *
	 * Return Values:
	 * (boolean) 
	 * True on success, false on failure.
	 *
	 **/

	$wp_customize->add_setting(
		'disable_emoji',
		array(
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'wp_less_is_more__sanitize_checkbox',
		)
	);

	/*
	 * Entry Meta
	 *
	 * Return Values:
	 * (boolean) 
	 * True on success, false on failure.
	 *
	 **/

	$wp_customize->add_setting(
		'entry_meta',
		array(
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'wp_less_is_more__sanitize_checkbox',
		)
	);
	
	/******************************************
	 *                                        *
	 *               Controls                 *
	 *                                        *
	 ******************************************
	 */

	$wp_customize->add_control(
		// $id
		'display_footer_text_control',
		// $args
		array(
			'label'			=> __( 'Display footer text', 'wp-less-is-more' ),	
			'settings'		=> 'display_footer_text',
			'section'		=> 'wp_less_is_more_custom_footer_section',
			'type'			=> 'checkbox'
	)
	);
	
	$wp_customize->add_control(
		'custom_footer_control', 
		array(
			'label'    => __( 'Text in footer:', 'wp-less-is-more' ),
			'description' => sprintf( __( 'Use this field to override the default footer text. If nothing specified, default text will be used instead. You may use these HTML tags and attributes: <code>%s</code>.', 'wp-less-is-more' ), esc_html( '<a href="" title=""> <b> <del datetime=""> <em> <i> <q cite=""> <s> <strike> <strong> ' ) ),
			'section'  => 'wp_less_is_more_custom_footer_section',
			'settings' => 'custom_footer_text',
			'type'     => 'text'
		)
	);
	
	$wp_customize->add_control(
    'excerpt_length_control',
		array(
			'label' => __( 'Use the slider or enter a number:', 'wp-less-is-more' ),
			'settings' => 'excerpt_length',	
			'section' => 'wp_less_is_more_excerpt_length_section',			
			'type' => 'range',
			'input_attrs' => array(
				'min' => 1,
				'max' => 200,
				'step' => 1,
				'style' => 'color: red',
			),
		)
	);

	$wp_customize->add_control(
    '_excerpt_length_control',
		array(
			'description' => __( 'Available slider range: 1 to 200', 'wp-less-is-more' ),
			'settings' => 'excerpt_length',	
			'section' => 'wp_less_is_more_excerpt_length_section',			
			'type' => 'number',
		)
	);

	// $wp_customize->add_control(
    // 'dereg_jq_control',
		// array(
			// 'label' =>	__('Deregister jQuery', 'wp-less-is-more'),
			// 'description' => __( 'It deregister only jQuery Core and jQuery Migrate. <hr/>', 'wp-less-is-more' ),
			// 'settings' => 'dereg_jq',	
			// 'section' => 'wp_less_is_more_speed_up',			
			// 'type' => 'checkbox',
		// )
	// );
	
	$wp_customize->add_control(
    'move_to_footer_control',
		array(
			'label' =>	__( 'Move to footer', 'wp-less-is-more' ),
			'description' => __( 'It removes all others scripts from head and prints them in footer. <hr/>', 'wp-less-is-more' ),
			'settings' => 'move_to_footer',	
			'section' => 'wp_less_is_more_speed_up',			
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_control(
    'disable_emoji_control',
		array(
			'label' =>	__( 'Disable emojicons', 'wp-less-is-more' ),
			'description' => __( 'It removes all actions related to emojis. <hr/>', 'wp-less-is-more' ),
			'settings' => 'disable_emoji',	
			'section' => 'wp_less_is_more_speed_up',			
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_control(
    'entry_meta_control',
		array(
			'label' =>	__( 'Use icons instead of text', 'wp-less-is-more' ),
			'description' => __( 'Go to the post meta data & comments section to see the effects <hr/>', 'wp-less-is-more' ),
			'settings' => 'entry_meta',	
			'section' => 'wp_less_is_more_entry_meta',			
			'type' => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'wp_less_is_more__theme_customize', 11 );