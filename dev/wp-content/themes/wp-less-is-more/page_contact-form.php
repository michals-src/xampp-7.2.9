<?php
/**
 * Template Name: @ Contact form template @
 * Description: This is realy simply contact form template for your convinient use. No need to install aditional contact forms plugins. That's what every theme supposed to have as a default feature.
 *
 * Use: @wp_less_is_more_contact_form function*
 *
 * @package WordPress
 * @subpackage WP Less is More
 * @since WP Less is More 1.1.4
 */

 get_header();

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article>

<h3 class=" text-center container single-entry-title entry-title"><?php the_title(); ?></h3><hr/>

<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive')) ?>

<div class="clearfix top"></div>

<?php 	the_content(); 

		/*
		 * See: line 872 in functions.php 
		 *
		 */
		
		wp_less_is_more__contact_form();		
?>

<div class="clearfix"></div>

<!--

<?php trackback_rdf(); ?>

-->

</article>

<?php endwhile; else: ?>
<p><?php _e( 'Sorry, no posts matched your criteria.', 'wp-less-is-more' ); ?></p>
<?php endif;
get_footer();?>