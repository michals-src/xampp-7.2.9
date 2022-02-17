<?php
/**
 * Theme customizer File
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register theme settings through customizer
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 */
function aakriti_personal_blog_register_customizer_settings( $wp_customize ) {
	
	$default_settings = aakriti_personal_blog_default_settings();	
	require get_template_directory() . '/includes/class-control-upg.php';

	/***** Latest Post Settings *****/
	$wp_customize->add_section( 'wpostheme_general_lastestpost_section', array(
		'title' => __( 'Latest Post Slider Settings', 'aakriti-personal-blog' ),
	));	

	
	
	/***** Website Color Seeings *****/

	$wp_customize->add_panel( 'website_colors_panel', array(
	        'title' => __( 'Website Colors', 'aakriti-personal-blog' ),
	));

	$wp_customize->add_section( 'nav_section' , array(
			'title' =>  __('Navigation Color', 'aakriti-personal-blog'),
			'panel' => 'website_colors_panel',			
	));

	$wp_customize->add_section( 'heading_section' , array(
			'title' =>  __('Heading Color', 'aakriti-personal-blog'),
			'panel' => 'website_colors_panel',			
	));

	$wp_customize->add_section( 'link_section' , array(
			'title' =>  __('Link Color', 'aakriti-personal-blog'),
			'panel' => 'website_colors_panel',			
	));

	// Navigation background color
	$txtcolors[] = array(
		'slug'			=>'menu_bar_bg_clr',
		'default' 		=> $default_settings['menu_bar_bg_clr'],
		'label' 		=> __('Navigation Bar - Background Color', 'aakriti-personal-blog'),
		'section'   	=> 'nav_section',
		'section_title' => __('Navigation Color', 'aakriti-personal-blog'),
	);
	
	// Navigation link color
	$txtcolors[] = array(
		'slug' 			=> 'menu_bar_link_clr',
		'default' 		=> $default_settings['menu_bar_link_clr'],
		'label' 		=> __('Navigation Bar - Link Color', 'aakriti-personal-blog'),
		'section'   	=> 'nav_section',
		'section_title' => __('Navigation Color', 'aakriti-personal-blog'),
	);
	
	// Navigation link hover color
	$txtcolors[] = array(

		'slug' 			=>'menu_bar_linkh_clr', 
		'default' 		=> $default_settings['menu_bar_linkh_clr'],
		'label' 		=> __('Navigation Bar - Link Hover Color', 'aakriti-personal-blog'),
		'section'   	=> 'nav_section',
		'section_title' => __('Navigation Color', 'aakriti-personal-blog'),

	);
	
	// Site heading color
	$txtcolors[] = array(
		'slug' 			=> 'h1_clr',
		'default' 		=> $default_settings['h1_clr'],
		'label' 		=> __('H1 Color', 'aakriti-personal-blog'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'aakriti-personal-blog'),

	);

	// H2 color
	$txtcolors[] = array(
		'slug' 			=> 'h2_clr',
		'default' 		=> $default_settings['h2_clr'],
		'label' 		=> __('H2 Color', 'aakriti-personal-blog'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'aakriti-personal-blog'),

	);

	// H3 color
	$txtcolors[] = array(
		'slug' 			=> 'h3_clr',
		'default' 		=> $default_settings['h3_clr'],
		'label' 		=> __('H3 Color', 'aakriti-personal-blog'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'aakriti-personal-blog'),

	);

	// H4 color
	$txtcolors[] = array(
		'slug' 			=> 'h4_clr',
		'default' 		=> $default_settings['h4_clr'],
		'label' 		=> __('H4 Color', 'aakriti-personal-blog'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'aakriti-personal-blog'),

	);

	// H5 color
	$txtcolors[] = array(
		'slug' 			=> 'h5_clr',
		'default' 		=> $default_settings['h5_clr'],
		'label' 		=> __('H5 Color', 'aakriti-personal-blog'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'aakriti-personal-blog'),

	);

	// H6 color
	$txtcolors[] = array(
		'slug' 			=> 'h6_clr',
		'default' 		=> $default_settings['h6_clr'],
		'label' 		=> __('H6 Color', 'aakriti-personal-blog'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'aakriti-personal-blog'),

	);

	// Site link color
	$txtcolors[] = array(
		'slug' 			=> 'link_clr', 
		'default' 		=> $default_settings['link_clr'],
		'label' 		=> __('Link Color', 'aakriti-personal-blog'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'aakriti-personal-blog'),
	);

	// Site link hover color
	$txtcolors[] = array(
		'slug' 		=> 'hover_link_clr', 
		'default' 	=> $default_settings['hover_link_clr'],
		'label' 	=> __('Link Hover Color', 'aakriti-personal-blog'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'aakriti-personal-blog'),
	);

	// Read continue.
	$txtcolors[] = array(
		'slug' 			=>'continue_read_clr', 
		'default' 		=> $default_settings['continue_read_clr'],
		'label' 		=> __('Continue Reading Button Color', 'aakriti-personal-blog'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'aakriti-personal-blog'),
	);

	$txtcolors[] = array(
		'slug' 			=> 'continue_read_hvr_clr', 
		'default' 		=> $default_settings['continue_read_hvr_clr'],
		'label' 		=> __('Continue Reading Button hover Color', 'aakriti-personal-blog'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'aakriti-personal-blog'),
	);

	// Website color settings
	foreach( $txtcolors as $txtcolor ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$txtcolor['slug'], array(
				'default' 				=> $txtcolor['default'],
				'sanitize_callback'     => 'sanitize_hex_color',
				'capability' 			=> 'edit_theme_options'
		));

		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $txtcolor['slug'],
				array(
					'label' 	=> $txtcolor['label'], 
					'section' 	=> $txtcolor['section'],
					'settings' 	=> $txtcolor['slug']
				))
		);
	} // End of foreach


	/* Post Settings panel*/
    $wp_customize->add_panel('post_panel', array(
	        'title' => __( 'Post Settings', 'aakriti-personal-blog' ),

	));     
    
	/* Blog Page Settings */
	$wp_customize->add_section( 'blog-sett' , array(
		'title' =>  __( 'Blog Page', 'aakriti-personal-blog' ),
		'panel' => 'post_panel',
	));	
 	
	
	// Add blog layout  excerpt length
	$wp_customize->add_setting( 'blog_excerpt_length', array(
									'sanitize_callback' => 'absint',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_excerpt_length'],
							));

	$wp_customize->add_control( 'blog_excerpt_length', array(		
		'label'    	=> __( 'Excerpt Length', 'aakriti-personal-blog' ),
		'section'    => 'blog-sett',
		'settings'   => 'blog_excerpt_length',
		'type'       => 'number',		
		'description'	=> __('Enter excerpt length eg 40', 'aakriti-personal-blog')
	));	
	
	
	// Show/hide date
	$wp_customize->add_setting( 'blog_show_date', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_date'],
							));

	$wp_customize->add_control( 'blog_show_date', array(
		'label'    		=> __( 'Show Post Date', 'aakriti-personal-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_date',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post date.', 'aakriti-personal-blog')
	));

	// Show/hide author
	$wp_customize->add_setting( 'blog_show_author', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_author'],
							));

	$wp_customize->add_control( 'blog_show_author', array(		
		'label'    		=> __( 'Show Post Author', 'aakriti-personal-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_author',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post author.', 'aakriti-personal-blog')
	));
	
	// Show/hide Category
	$wp_customize->add_setting( 'blog_show_cat', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_cat'],
							));

	$wp_customize->add_control( 'blog_show_cat', array(
		'label'    	=> __( 'Show Post Category', 'aakriti-personal-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_cat',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post category.', 'aakriti-personal-blog')
	));
	
	// Show/hide Tags
	$wp_customize->add_setting( 'blog_show_tags', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_tags'],
							));

	$wp_customize->add_control( 'blog_show_tags', array(		
		'label'    		=> __( 'Show Post Tags', 'aakriti-personal-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_tags',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post tags.', 'aakriti-personal-blog')
	));
	
	// Show/hide Comments
	$wp_customize->add_setting( 'blog_show_comment', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_comment'],
							));

	$wp_customize->add_control( 'blog_show_comment', array(		
		'label'    		=> __( 'Show Post Comment', 'aakriti-personal-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_comment',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post comment.', 'aakriti-personal-blog')
	));


	// Show/hide read more button
	$wp_customize->add_setting( 'blog_show_readmore', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_readmore'],
							));

	$wp_customize->add_control( 'blog_show_readmore', array(		
		'label'    		=> __( 'Show Continue Reading Button', 'aakriti-personal-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_readmore',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show Continue Reading Button.', 'aakriti-personal-blog')
	));


	/***** Category Page Settings *****/
	$wp_customize->add_section( 'cat-sett' , array(
		'title' =>  __( 'Category Page', 'aakriti-personal-blog' ),
		'panel' => 'post_panel',
	));		

	// Add Category layout  excerpt length
	$wp_customize->add_setting( 'cat_excerpt_length', array(
									'sanitize_callback' => 'absint',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_excerpt_length'],
							));

	$wp_customize->add_control( 'cat_excerpt_length', array(		
		'label'    	=> __( 'Excerpt Length', 'aakriti-personal-blog' ),
		'section'    => 'cat-sett',
		'settings'   => 'cat_excerpt_length',
		'type'       => 'number',		
		'description'	=> __('Enter excerpt length eg 40', 'aakriti-personal-blog')
	));	

	

	// Show/hide date
	$wp_customize->add_setting( 'cat_show_date', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_date'],
							));

	$wp_customize->add_control( 'cat_show_date', array(		
		'label'    		=> __( 'Show Post Date', 'aakriti-personal-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_date',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post date.', 'aakriti-personal-blog')
	));

	// Show/hide author
	$wp_customize->add_setting( 'cat_show_author', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_author'],
							));

	$wp_customize->add_control( 'cat_show_author', array(		
		'label'    		=> __( 'Show Post Author', 'aakriti-personal-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_author',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post author.', 'aakriti-personal-blog')
	));

	// Show/hide Category
	$wp_customize->add_setting( 'cat_show_cat', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_cat'],
							));

	$wp_customize->add_control( 'cat_show_cat', array(		
		'label'    		=> __( 'Show Post Category', 'aakriti-personal-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_cat',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post category.', 'aakriti-personal-blog')
	));
	
	// Show/hide Tags
	$wp_customize->add_setting( 'cat_show_tags', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_tags'],
							));

	$wp_customize->add_control( 'cat_show_tags', array(		
		'label'    		=> __( 'Show Post Tags', 'aakriti-personal-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_tags',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post tags.', 'aakriti-personal-blog')
	));
	
	// Show/hide Comments
	$wp_customize->add_setting( 'cat_show_comment', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_comment'],
							));

	$wp_customize->add_control( 'cat_show_comment', array(		
		'label'    		=> __( 'Show Post Comment', 'aakriti-personal-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_comment',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post comment.', 'aakriti-personal-blog')
	));


	
	// Show/hide read more button
	$wp_customize->add_setting( 'cat_show_readmore', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_readmore'],
							));

	$wp_customize->add_control( 'cat_show_readmore', array(		
		'label'    		=> __( 'Show Continue Reading Button', 'aakriti-personal-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_readmore',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show Continue Reading Button.', 'aakriti-personal-blog')
	));

	
	/***** Single Post Settings *****/
	$wp_customize->add_section( 'single-post-sett' , array(
		'title' =>  __( 'Single Post', 'aakriti-personal-blog' ),
		'panel' => 'post_panel',
	));
	

	// Add blog template settings
	$wp_customize->add_setting( 'single_post_fet_img', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['single_post_fet_img'],
							));

	$wp_customize->add_control( 'single_post_fet_img', array(		
		'label'    		=> __( 'Show Featured Image.', 'aakriti-personal-blog' ),
		'section'    	=> 'single-post-sett',
		'settings'  	=> 'single_post_fet_img',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show featured image from single post.', 'aakriti-personal-blog')
	));


	// related
	$wp_customize->add_setting( 'related_post_show', array(
									'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['related_post_show'],
							));

	$wp_customize->add_control( 'related_post_show', array(		
		'label'    		=> __( 'Related Post.', 'aakriti-personal-blog' ),
		'section'    	=> 'single-post-sett',
		'settings'  	=> 'related_post_show',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show Related post.', 'aakriti-personal-blog')
	));


	$wp_customize->add_setting( 'related_post_title', array(
									'sanitize_callback' => 'sanitize_text_field',
									'transport'         => 'refresh',
									'default'           => $default_settings['related_post_title'],
							   ));

	$wp_customize->add_control( 'related_post_title', array(		
		'label'    		=> __( 'Related Post Title.', 'aakriti-personal-blog' ),
		'section'    	=> 'single-post-sett',
		'settings'  	=> 'related_post_title',
		'type'       	=> 'text',
		'description' 	=> __('Enter related post title.', 'aakriti-personal-blog')
	));

	
	
	/***** Social Icons Settings *****/
	$wp_customize->add_section( 'wpostheme_general_socials_section', array(
		'title' => __( 'Social Profile', 'aakriti-personal-blog' ),
	));	

	// Socials Icons on Header
	$wp_customize->add_setting( 'header_social', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['header_social'],
									));

	$wp_customize->add_control( 'header_social', array(
										'label'    		  => __( 'Enable Socials Icons on Header', 'aakriti-personal-blog' ),
										'section' 		  => 'wpostheme_general_socials_section',
										'type'                    => 'checkbox',
									));

	// Socials Icons on Footer
	$wp_customize->add_setting( 'footer_social', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_checkbox',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['footer_social'],
									));

	$wp_customize->add_control( 'footer_social', array(
										'label'    		  => __( 'Enable Socials Icons on Footer', 'aakriti-personal-blog' ),
										'section' 		  => 'wpostheme_general_socials_section',
										'type'                    => 'checkbox',
									));

	// Facebook
	$wp_customize->add_setting( 'facebook', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['facebook'],
									));

	$wp_customize->add_control( 'facebook', array(
										'label'    => __( 'Facebook', 'aakriti-personal-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Twitter
	$wp_customize->add_setting( 'twitter', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['twitter'],
									));

	$wp_customize->add_control( 'twitter', array(
										'label'    => __( 'Twitter', 'aakriti-personal-blog' ),
										'section'  => 'wpostheme_general_socials_section',			
									));

	// Linkedin
	$wp_customize->add_setting( 'linkedin', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['linkedin'],
									));

	$wp_customize->add_control( 'linkedin', array(
										'label'    => __( 'Linkedin', 'aakriti-personal-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Instagram
	$wp_customize->add_setting( 'instagram', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['instagram'],
									));

	$wp_customize->add_control( 'instagram', array(
										'label'    => __( 'Instagram', 'aakriti-personal-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// YouTube
	$wp_customize->add_setting( 'youtube', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['youtube'],
									));

	$wp_customize->add_control( 'youtube', array(
										'label'    => __( 'YouTube', 'aakriti-personal-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Behance
	$wp_customize->add_setting( 'behance', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['behance'],
									));

	$wp_customize->add_control( 'behance', array(
										'label'    => __( 'Behance', 'aakriti-personal-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Dribbble
	$wp_customize->add_setting( 'dribbble', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['dribbble'],
									));

	$wp_customize->add_control( 'dribbble', array(
										'label'    => __( 'Dribbble', 'aakriti-personal-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Pinterest
	$wp_customize->add_setting( 'pinterest', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['pinterest'],
									));

	$wp_customize->add_control( 'pinterest', array(
										'label'    => __( 'Pinterest', 'aakriti-personal-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));
	





	/***** Footer Settings *****/
	$wp_customize->add_section( 'wpostheme_general_footer_section', array(
		'title' => __( 'Footer Content', 'aakriti-personal-blog' ),			
	));

	// Footer Copyright
	$wp_customize->add_setting( 'copyright', array(
										'sanitize_callback' => 'aakriti_personal_blog_sanitize_clean',
										'default'           => $default_settings['copyright'],
										'transport'         => 'refresh',	
									));

	$wp_customize->add_control( 'copyright', array(
										'label'    => __( 'Footer Copyright', 'aakriti-personal-blog' ),
										'description'	=> __('If you want to add the copyrights please use the following text - &copy {year} YOUR BRAND NAME', 'aakriti-personal-blog'),
										'section'  => 'wpostheme_general_footer_section',
									));	
									
	/*****aakriti-personal blog pro *****/
	$wp_customize->add_section(
		'amyra_pro_section', array(
			'title'    => __( 'View PRO Version', 'aakriti-personal-blog' ),
			'priority' => 1,
		)
	);

	$wp_customize->add_setting(
		'amyra_pro_control', array(
			'sanitize_callback' => 'esc_html',
		)
	);

	/*
     * View Pro Version Section Control
     */

	$wp_customize->add_control(
		new Aakriti_Personal_Blog_Control_Upg(
			$wp_customize, 'amyra_pro_control', array(
				'section'     => 'amyra_pro_section',
				'priority'    => 100,
				'options'     => array(
					esc_html__( '- 4 layouts', 'aakriti-personal-blog' ),					
					esc_html__( '- Offering different background color and font color in post categories. ', 'aakriti-personal-blog' ),
					esc_html__( '- 5 Post Format', 'aakriti-personal-blog' ),
					esc_html__( '- 2 Widgets', 'aakriti-personal-blog' ),					
					esc_html__( '- 100+ Google Fonts', 'aakriti-personal-blog' ),					
				),
				'button_url'  => esc_url( 'https://www.wponlinesupport.com/wordpress-themes/aakriti-wordpress-blog-theme/' ),
				'button_text' => esc_html__( 'View PRO Version', 'aakriti-personal-blog' ),
			)
		)
	);									
										
	
	
	
}
add_action( 'customize_register', 'aakriti_personal_blog_register_customizer_settings' );
