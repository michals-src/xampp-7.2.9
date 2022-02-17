<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( "charset" ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<header class="site-header mb-4">
	<?php 
		// Notices
		// Cookies
	    // Okno wyskakujące z informacją
		//do_action( "stayfit_theme_site_before_header" ); 
	?>
	<div class="container site-wrapper pl-md-4 pr-md-4">
		<?php do_action( "stayfit_theme_site_header" ); ?>
	</div>
</header>
<main id="site-main">