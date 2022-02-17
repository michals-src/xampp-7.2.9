<?php get_header();

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article>
<h3 class=" text-center container single-entry-title entry-title"><?php the_title(); ?></h3>
<hr/>

<?php  the_post_thumbnail( 'post-thumbnail', array ( 'class' => 'img-responsive' )); ?>

<div class="clearfix top"></div>

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

<nav>
  <ul class="pager">
	<li class="previous"><?php 	previous_post_link( '%link', '<span aria-hidden="true">&larr;</span> '. __( 'Previous post', 'wp-less-is-more' ) ); ?></li>
	<li class="next"><?php 		next_post_link( '%link', __( 'Next post', 'wp-less-is-more' ).' <span aria-hidden="true">&rarr;</span>' ); ?></li>
  </ul>
</nav>

<hr/>

<?php wp_less_is_more__entry_meta(); ?>

<?php comments_template(); ?>

</article>

<?php endwhile; else: ?>
<p><?php _e( 'Sorry, no posts matched your criteria.', 'wp-less-is-more' ); ?></p>
<?php endif;
get_footer(); ?>