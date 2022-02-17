<div id="p-0">

    <div class="mb-3"><h5><strong>Lista klientów</strong></h5></div>
    <div id="sf-dashboard-settings" class="list-group">
		

    	<div class="row">
    		<?php

    			$no = 2;
    			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			    if($paged==1){
			      $offset=0;  
			    }else {
			       $offset= ($paged-1)*$no;
			    }

    			$user_query = new WP_User_Query( array(
    				'role' => 'subscriber',
    				'fields' => array( 'ID' ),
    				'number' => $no,
    				'offset' => $offset
    			) );

    			$users = $user_query->get_results();

    			if( empty( $users ) ){
    				echo 'Brak użytkowników.';
    			}

    		?>

    		<?php foreach( $users as $user ): 

		    	$first_name = get_user_meta( $user->ID, 'first_name' );
		    	$last_name = get_user_meta( $user->ID, 'last_name' );
		    	$public_id = get_user_meta( $user->ID, 'public_id' );

    		?>
    			<div class="col-12">
	    			<a href="<?php echo get_permalink(); ?>?page=client_manager.person&id=<?php echo $public_id[0]; ?>">
		    			<div class="card">
		  					<div class="card-body">
		    				<strong><?php echo $first_name[0] . ' ' . $last_name[0]; ?></strong>
			    			</div>
			    		</div>
			    	</a>
			    </div>
    		<?php endforeach; ?>

    		<?php
	            $total_user = $user_query->total_users;  
	            $total_pages=ceil($total_user/$no);

	            $pages = paginate_links(array(  
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'format'       => '?paged=%#%',
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'total'        => $total_pages,
						'type'         => 'array',
						'show_all'     => false,
						'end_size'     => 3,
						'mid_size'     => 1,
						'prev_next'    => false,
						'add_args'     => false,
						'add_fragment' => ''
	                ));

	            if( empty( $pages ) ){
	            	$pages = array();
	            }

			?>

    	</div>

<nav aria-label="Page navigation example" style="margin-top: 25px;">
  <ul class="pagination justify-content-center">
				
				<?php 

				foreach ($pages as $page) {
                        echo '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
                }

				?>

  </ul>
</nav>

	</div>

</div>