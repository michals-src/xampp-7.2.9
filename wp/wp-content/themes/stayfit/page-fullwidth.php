<?php
/**
 *
 *  Copyright (C) 2018 Stay Fit - All rights reserved
 *
 *  Template Name: Pełna szerokość strony
 *	Description: Szablon strony bez dodatkowego obrazu wyróżniającego
 *  Author: Administrator
 *
 */

 get_header(); ?>

<div class="page-header">
	<div class="container site-wrapper">
		<header>
			<h1 class="site-title">
				<?php the_title(); ?>
			</h1>
		</header>
	</div>
</div>
<div class="page-content">
	<div class="container-fluid site-wrapper">
		<div class="row no-gutters">
			
			<div class="col sm-12">
				<section>
					<div class="pl-sm-1 pr-sm-1 pl-md-4 pr-md-4">

						<?php 

							if( have_posts() ):
								while( have_posts() ): the_post();

									the_content();

								endwhile;
							endif;

						?>

					</div>
				</section>
			</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>