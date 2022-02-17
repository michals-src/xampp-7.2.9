<?php

Class StayFit_Theme_Site_Header{
	
	public function __construct(){

		add_action( "stayfit_theme_site_header", array( $this, "get_header" ) );

	}

	public function get_header(){
		?>

			<nav class="navbar navbar-horizontal clearfix">
				<div>

					<!-- Navbar-menuicon -->
					<div class="navbar-menuicon" data-menu="site-navigation">
						<span class="oi" data-glyph="menu"></span>
					</div>
					<!-- / Navbar-menuicon -->
					
					<!-- Navbar-logotype -->
					<div class="navbar-logotype">
						<picture class="navbar-logotype-img"><img src="https://www.freeiconspng.com/uploads/courses-icon-10.png" alt=""></picture>
						<div class="navbar-logotype-text"><a href="#">Stay Fit</a></div>
					</div>
					<!-- / Navbar-logotype -->

					<!-- Navbar-menu -->
					<div class="navbar-menu" id="site-navigation">
						<?php wp_nav_menu(array(
							"menu"	=> "site-navigation",
							"container"	=> "ul",
							"menu_id"	=> "stayfit_menuicon_nav"
						)); ?>
					</div>
					<!-- / Navbar-menu -->

					<!-- Navbar-icons-area -->
					<ul class="navbar-icons-area pr-sm-1">
						<li class="navbar-icon navbar-icon-fb"><?php echo $this->get_facebook(); ?></li>
						<li class="navbar-icon-user">
							<?php wp_nav_menu(array(
								"theme_location"	=> "site-user-navigation",
								"container"	=> "ul",
								"menu_class"	=> "sub_menu-right",
								'walker' => new StayFit_Theme_Nav_Icon_Walker()
							)); ?>
						</li>
					</ul>
					<!-- / Navbar-icons-area -->

				</div>
			</nav>

		<?php
	}

	public function get_container_classes(){
		return "container site-wrapper";
	}

	public function get_facebook(){

		$element = '<a href="' . StayFit_Theme_Options::Get( "socials/fb/url" ) . '"><img src="' . StayFit_Theme_Options::GetImage( "socials/fb" ) . '" alt=""></a>';

		return $element;

	}

}