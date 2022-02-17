<?php get_header(); ?>

<div class="row">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
<article <?php post_class(); ?>>
<div class="col-xs-12 col-md-12">
    <div class="thumbnail">

<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive')) ?>

		<div class="caption">
		<h3><a href="<?php the_permalink(); ?>" rel="<?php esc_attr_e( 'bookmark', 'wp-less-is-more' ); ?>" title="<?php esc_attr_e( 'Permanent Link to:', 'wp-less-is-more' ); ?>&nbsp;<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

		<?php the_excerpt(); ?>

		<p class="text-right"><a href="<?php the_permalink(); ?>" rel="<?php esc_attr_e( 'bookmark', 'wp-less-is-more' ); ?>" title="<?php esc_attr_e( 'Permanent Link to:', 'wp-less-is-more' ); ?>&nbsp;<?php the_title_attribute(); ?>" class="btn btn-default" role="button"><?php _e( 'Read more...', 'wp-less-is-more' ); ?></a></p>

		</div>
	</div>
</div>
<!--

<?php trackback_rdf(); ?>

-->
</article>

<?php endwhile; else: ?>
<p><?php _e( 'Sorry, no posts matched your criteria.', 'wp-less-is-more' ); ?></p>

<?php endif; 

 wp_less_is_more__numeric_posts_nav(); ?>
 
 </div>
<!-- End of main row -->

<?php get_footer(); ?>