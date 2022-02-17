<?php get_header();

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article>

<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive')) ?>

<div class="clearfix"></div>

<?php the_content();

 	wp_less_is_more__bootstrap_link_pages( 

	$args = array	(
		'before'		=> '<p class="pager">' . __( 'Go to:', 'wp-less-is-more' ),
		'after'			=> '</p>',
		'link_before'	=> '<button type="button" class="btn btn-xs btn-danger">',
		'link_after'	=> '</button>',
		'current_before'=> '<button class="btn btn-default btn-xs disabled">',
		'current_after'	=> '</button>',
		'separator'		=> '&nbsp;&nbsp;',
		'pagelink'		=> _x( 'part: %', 'single post & page', 'wp-less-is-more' ),

	));
?>

<div class="clearfix"></div>

<!--

<?php trackback_rdf(); ?>

-->

</article>

<?php endwhile; else: ?>
<p><?php _e( 'Sorry, no posts matched your criteria.', 'wp-less-is-more' ); ?></p>
<?php endif;
get_footer(); ?>