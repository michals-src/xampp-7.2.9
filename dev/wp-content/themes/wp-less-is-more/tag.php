<?php get_header();

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article>
<h4><a href="<?php the_permalink(); ?>"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> <?php the_title(); ?> </a></h4>

<?php wp_link_pages( 

	$args = array	(

		'link_before'	=> '<button type="button" class="btn btn-xs btn-danger">',
		'link_after'	=> '</button>',
		'separator'		=> '&nbsp;&nbsp;',
		'pagelink'		=> _x( 'part: %', 'category & tag page', 'wp-less-is-more' )

	));
?>

<!--

<?php trackback_rdf(); ?>

-->

</article>

<?php endwhile; else: ?>
<p><?php _e( 'Sorry, no posts matched your criteria.', 'wp-less-is-more' ); ?></p>
<?php endif;
get_footer(); ?>