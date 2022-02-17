<div id="screen">
	<?php 

		$translate = array(
			'Monday' => 'Poniedziałek',
			'Tuesday' => 'Wtorek',
			'Wednesday' => 'Środa',
			'Thursday' => 'Czwartek',
			'Friday' => 'Piątek',
			'Saturday' => 'Sobota',
			'Sunday' => 'Niedziela',
		);

		$url = add_query_arg(array(
				'page' => 'timetable',
			),
			get_permalink()
		);

	?>
	<?php if( in_array( $this->params['editItem'], [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] ) ) {  ?>

		<div class="mb-1"><h3><strong>Edycja <?php echo ucfirst( $translate[$this->params['editItem']] ); ?></strong></h3></div>

		<form>
			<input type="hidden" name="action" value="submit_timetable_clock">
			<input type="hidden" name="error" value="error_timetable-clock">
			<input type="hidden" name="redirect_url" value="<?php echo get_permalink(); ?>">
			<?php wp_nonce_field( 'submit_timetable_clock-nonce', 'stayfit_manager_save_options-timetable' ); ?>

			<?php 

				$time = get_terms( 'timetable-clock' );
				if( ! empty( $time ) ) {

					foreach( $time as $key => $value ){
?>
			<div class="form-group row">
				<div class="col md-2">
					<h4><?php echo $value->name; ?></h4>
				</div>
				<div class="col md-10">
					<select>
						<option>Ćwiczenia #1</option>
						<option>Ćwiczenia #2</option>
						<option>Ćwiczenia #3</option>
						<option>Ćwiczenia #4</option>
						<option>Ćwiczenia #5</option>
					</select>
				</div>
			</div>
<?php	
					}

				}else{
					echo "<p>Nie dodano jeszcze godzin ćwiczeń.</p>";
				}

			?>

			
			<div class="form-group">
				<ul class="nav personal">
					<li><button type="submit" class="btn btn-primary">Zapisz</button></li>
					<li><a href="<?php echo $url; ?>">Anuluj</a></li>
				</ul>
			</div><!-- Zapisz -->
		</form>
		<div class="row">
			
		</div>

	<?php }else{
		//redirect
		wp_redirect( $url );
	} ?>

</div>