<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
<?php
	// Get some variable 
	$header_social  = aakriti_personal_blog_get_theme_mod( 'header_social' );	
?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aakriti-personal-blog' ); ?></a>	
<header id="masthead" class="site-header" role="banner">		
		<div class="site-branding container clearfix">
			<div class="aakriti-personal-blog-columns-row">
				<div class="header-logo aakriti-personal-blog-col-12 aakriti-personal-blog-col-sm-12 aakriti-personal-blog-columns">
					<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
					<?php    $image = wp_get_attachment_image_src( aakriti_personal_blog_get_theme_mod( 'custom_logo' ) , 'full' ); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php  echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
					</a>
					<?php } else { ?>
						<div class="site-title-wrap">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
					<?php } ?>
				</div>	
				<?php if(!empty($header_social)) { ?>
					<div class="aakriti-personal-blog-social-networks aakriti-personal-blog-social-networks-header aakriti-personal-blog-col-12 aakriti-personal-blog-column show-for-large-only">
						<?php aakriti_personal_blog_get_header_social_icon(); ?>
					</div>
				<?php } ?>	
			</div><!-- .Row -->
		</div><!-- .logo -->
		<div class="header-content">        
			<div class="header-content__container container">
					<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'aakriti-personal-blog' ); ?></button>
							<div class="mobile-logo">
							<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								$image = wp_get_attachment_image_src( aakriti_personal_blog_get_theme_mod( 'custom_logo' ) , 'full' ); ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<img src="<?php  echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
								</a>
								<?php } else { ?>
									<div class="site-title-wrap">
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
									</div>
							<?php } ?>
							</div>
							<?php                    
								wp_nav_menu( array(
										'theme_location' => 'main-menu',
										'menu_id' => 'primary-menu',
								) );                     
							 ?>
					</nav><!-- #site-navigation --> 					
		           <?php  get_template_part( "template-header/header-search"); ?>       
		            		            
			</div>
		</div><!-- .header-content -->			
</header><!-- #masthead -->	
<div class="site-content-wrap clearfix">	
	<div id="content" class="site-content container">