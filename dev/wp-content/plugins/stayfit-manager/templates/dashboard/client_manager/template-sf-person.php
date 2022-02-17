<div id="p-0">

    <?php $monitor = new Sf_Monitor( array( $_GET['id'] ) ); ?>

    <div class="mb-3"><h5><strong>Profil użytkownika</strong></h5></div>
    <div class="mt-2"><p>Dodano: <?php echo $monitor->user_registered()[0]; ?></p></div>
    <div id="sf-dashboard-settings" class="list-group">
		
		<?php echo $form; ?>

        <div class="mt-5">
	        <div class="border border-primary p-2" style="border-radius:5px">
	        	<a href="<?php echo get_home_url(); ?>/person_print?id=<?php echo $id; ?>" target="_blank">Informacje do druku</a>
	        </div>
        </div>

        <div class="mt-3 p-3 border border-warning">
        	<h4>Monitor wejść</h4>
            <form>
                <select>
                    <option>Styczeń</option>
                    <option>Luty</option>
                    <option>Marzec</option>
                    <option>Kwiecień</option>
                    <option>Maj</option>
                    <option>Czerwiec</option>
                    <option>Lipiec</option>
                    <option>Sierpień</option>
                    <option selected>Wrzesień</option>
                    <option>Październik</option>
                    <option>Listopad</option>
                    <option>Grudzień</option>
                </select>
                <button>Pokaż</button>
            </form>
            <ul>
        	<?php 
        		//$date = date("d (D) - m (M) - Y @ H:i:s");
                $current_month = date("m");

                if( ! empty( $monitor->results() ) ){
                    if( ! empty( $monitor->results()[0][0][$current_month] ) ):

                    foreach( $monitor->results()[0][0][$current_month] as $result ):      
            ?>
                <li><?php echo $result; ?></li>
            <?php
                    endforeach;

                        else:
                            echo 'Brak';
                        endif;
                }else{
                    echo 'Brak';
                }


        	?>
        	
        	</ul>
        </div>

	</div>

</div>