<?php

function cmm_sample_shortcode( $atts, $content = null )
{
	$atts = shortcode_atts(array(
		'title' => 'Default Title'
	), $atts);

	$locations = get_terms('locations');
	if(!empty($locations) && !is_wp_error($locations))
	{
		$displayList = '<div id=job-location-list>';
		$displayList .= '<h4>' . esc_html__($atts['title']) . '</h4>';
		$displayList .= '<ul>';

		foreach ($locations as $location) {
			$displayList .= '<li class="job-location">';
			$displayList .= '<a href="' . esc_url( get_term_link($location) ) . '">';
			$displayList .= esc_html__($location->name);
			$displayList .= '</a>';
			$displayList .= '</li>';
		}

		$displayList .= '</ul>';
		$displayList .= '</div>';
	}

	return $displayList;
}
add_shortcode( 'job_listing', 'cmm_sample_shortcode' );

function cmm_get_by_location( $atts, $content = null )
{

	$atts = shortcode_atts(array(
		'title'		 	=> 'Jobs in',
		'count' 		=> 5,
		'location'		=> 'warsaw',
		'pagination'	=> false
	), $atts);

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	$args = array(
		'post_type' => 'job',
		'post_status' => 'publish',
		'no_found_rows' => $atts['pagination'],
		'posts_per_page' => $atts['count'],
		'paged' => $paged,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'tax_query' => array(
			array(
			'taxonomy' => 'locations',
			'field' => 'name',
			'terms' => $atts['location']
		))
	);

	$jobs_by_location = new WP_Query( $args );

	if( $jobs_by_location->have_posts() )
	{
		$display_by_location = '<div id="job-by-location">';
		$display_by_location .= '<h4>'.ucfirst($atts['location']).'</h4>';
		$display_by_location .= '<ul>';

		$time_start = microtime(true);

		while( $jobs_by_location->have_posts() ) : $jobs_by_location->the_post();

			global $post;

			$deadline = get_post_meta( get_the_ID(),'application_deadline',true );
			$title = get_the_title();
			$slug = get_permalink();

			$display_by_location .= '<li>';
			$display_by_location .=  sprintf('<a href="%s">%s</a>', esc_url($slug), esc_html__($title));
			$display_by_location .= ' <span>' . esc_html($deadline) . '</span>';
			$display_by_location .= '</li>';

		endwhile;

		$time_end = microtime(true);
		$time_finally = $time_end - $time_start;

		$display_by_location .= '</ul>';
		$display_by_location .= 'Rendered in ' . substr( $time_finally, 0, strlen($time_finally) - 10);
		$display_by_location .= '</div>';

	}

	wp_reset_postdata();

	return $display_by_location;

}
add_shortcode( 'jobs_by_location', 'cmm_get_by_location' );
