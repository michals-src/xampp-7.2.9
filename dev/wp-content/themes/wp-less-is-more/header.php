<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<div class="container">
<?php if ( get_custom_header()->url != null && ( is_home() or is_front_page() ) ) { ?>

<header id="masthead" class="site-header" role="banner"><img alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo bloginfo( 'description' ); ?>" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" /></header>

<?php  } ?>
<div class="header clearfix">

<nav class="navbar-default" role="navigation">
	<div class="container-fluid">
	   <div class="navbar-header">
		<h3 class="site-title">
		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php wp_less_is_more__site_title(); ?></a>
		</h3>
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		  <span class="sr-only"><?php _e( 'Toggle navigation', 'wp-less-is-more' ); ?></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
	   </button>
		 
	  </div>
<?php
		wp_nav_menu( array(
			
			'theme_location'	=> 'top',
			'depth'				=> 2,
			'container'			=> 'div',
			'container_class'	=> 'navbar-collapse collapse',
			'container_id'		=> 'navbar',
			'menu_class'		=> 'nav navbar-nav navbar-right',
			'fallback_cb'		=> 'Wp_Less_Is_More_Bootstrap_Navwalker::fallback',
			'walker'			=> New Wp_Less_Is_More_Bootstrap_Navwalker()
			
			)
		);
?>
	</div>
</nav>
</div>
<?php echo wp_less_is_more__taxonomy_title(); ?>