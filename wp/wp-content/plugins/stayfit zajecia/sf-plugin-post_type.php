<?php

function sf_register_menu_page(){

  $singular = "Ćwiczenie";
	$plural = "Zajęcia";

	$labels = array(
		'name' 			=> $plural,
		'singular_name' 	=> $singular,
		'add_new' 		=> 'Dodaj nowy',
		'add_new_item'  	=> 'Dodaj nowy ' . $singular,
		'edit'		        => 'Edytuj',
		'edit_item'	        => 'Edytuj ' . $singular,
		'new_item'	        => 'Nowy ' . $singular,
		'view' 			=> 'Zobacz ' . $singular,
		'view_item' 		=> 'Zobacz ' . $singular,
		'search_term'   	=> 'Szukaj ' . $plural,
		'parent' 		=> 'Rdzeń ' . $singular,
		'not_found' 		=> 'Brak ' . $plural,
		'not_found_in_trash' 	=> 'Brak ' . $plural .' w koszu'
	);

	$args = array(
			'labels'              => $labels,
	    'public'              => false,
	    'publicly_queryable'  => true,
	    'exclude_from_search' => false,
	    'show_in_nav_menus'   => true,
	    'show_ui'             => true,
	    'show_in_menu'        => true,
	    'show_in_admin_bar'   => true,
	    'menu_position'       => 10,
	    'menu_icon'           => 'dashicons-businessman',
	    'can_export'          => true,
	    'delete_with_user'    => false,
	    'hierarchical'        => false,
	    'has_archive'         => true,
	    'query_var'           => true,
	    'capability_type'     => 'post',
	    'map_meta_cap'        => true,
	    // 'capabilities' => array(),
	    'rewrite'             => array(
	        'slug' => $slug,
	        'with_front' => true,
	        'pages' => true,
	        'feeds' => true,
	    ),
	    'supports'            => array(
	        'title'
	    )
	);

	register_post_type( 'exercise', $args );

}
add_action( "init", "sf_register_menu_page" );

?>
