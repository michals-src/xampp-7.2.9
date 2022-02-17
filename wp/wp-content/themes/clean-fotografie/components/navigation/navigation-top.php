<?php
/**
 * Primary Menu Template
 *
 * @package Clean_Fotografie
 */

?>
	<div class="menu-toggle-wrapper">
		<button id="menu-toggle" class="menu-toggle" aria-controls="top-menu" aria-expanded="false"></span><span class="menu-label"><?php esc_html_e( 'Menu', 'clean-fotografie' ); ?></span></button>
	</div><!-- .menu-toggle-wrapper -->
	<div id="site-header-menu" class="site-header-menu">
		<?php if ( has_nav_menu( 'menu-1' ) ) : ?>

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'clean-fotografie' ); ?>">
				<?php
					wp_nav_menu( array(
							'container'      => '',
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'menu nav-menu',
						)
					);
				?>

		<?php else : ?>

			<nav id="site-navigation" class="main-navigation default-page-menu" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'clean-fotografie' ); ?>">
				<?php wp_page_menu(
					array(
						'menu_class' => 'primary-menu-container',
						'before'     => '<ul id="menu-primary-items" class="menu nav-menu">',
						'after'      => '</ul>',
					)
				); ?>

		<?php endif; ?>

			</nav><!-- .main-navigation -->

		<div class="mobile-social-search">
			<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="Social Links Menu" aria-expanded="false">
				<button id="search-toggle" class="toggle-top"><span class="search-label screen-reader-text"><?php esc_html_e( 'Search', 'clean-fotografie' ); ?></span></button>

				<div id="header-search-container" class="search-container"><?php get_search_form(); ?></div>

				<?php if ( has_nav_menu( 'social-menu' ) ) : ?>
				<button id="share-toggle" class="toggle-top"><span class="search-label screen-reader-text"><?php esc_html_e( 'Social Menu', 'clean-fotografie' ); ?></span></button>

				<?php fotografie_social_menu(); ?>
				<?php endif; ?>
			</nav><!-- .social-navigation -->
		</div><!-- .mobile-social-search -->

	</div><!-- .site-header-menu -->
