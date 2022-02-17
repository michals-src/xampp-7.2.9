<div id="screen">
	<div class="row no-gutters">

		<div class="col sm-12 row">

			<div class="mb-1"><h3><strong>Przypisywanie zajęć</strong></h3></div>

			<div class="col sm-12 md-12 lg-4 col-border">

				<div class="row no-gutters">
					<div class="col sm-12">
						<div class="mb-0"><h4>
							<strong>Poniedziałek</strong>
							<div class="dot dot-green">Status</span>
						</h4></div>
					</div>
					<div class="col sm-12">
						<ul class="nav personal">
							<li><a href="#">Wyłącz</a></li>
							<li><a href="<?php echo add_query_arg(array(
								'page' => 'timetable',
								'action' => 'timetable_edit',
								'editItem' => 'Monday'
							),
							get_permalink()); ?>">Edytuj</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="col sm-12 md-12 lg-4 col-border">

				<div class="row no-gutters">
					<div class="col sm-12">
						<div class="mb-0"><h4>
							<strong>Wtorek</strong>
							<div class="dot dot-green">Status</span>
						</h4></div>
					</div>
					<div class="col sm-12">
						<ul class="nav personal">
							<li><a href="#">Wyłącz</a></li>
							<li><a href="#">Edytuj</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="col sm-12 md-12 lg-4 col-border">

				<div class="row no-gutters">
					<div class="col sm-12">
						<div class="mb-0"><h4>
							<strong>Środa</strong>
							<div class="dot dot-green">Status</span>
						</h4></div>
					</div>
					<div class="col sm-12">
						<ul class="nav personal">
							<li><a href="#">Wyłącz</a></li>
							<li><a href="#">Edytuj</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div style="display: block;width:100%;"></div>

			<div class="col sm-12 md-12 lg-4 col-border">

				<div class="row no-gutters">
					<div class="col sm-12">
						<div class="mb-0"><h4>
							<strong>Czwartek</strong>
							<div class="dot dot-green">Status</span>
						</h4></div>
					</div>
					<div class="col sm-12">
						<ul class="nav personal">
							<li><a href="#">Wyłącz</a></li>
							<li><a href="#">Edytuj</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="col sm-12 md-12 lg-4 col-border">

				<div class="row no-gutters">
					<div class="col sm-12">
						<div class="mb-0"><h4>
							<strong>Piątek</strong>
							<div class="dot dot-red">Status</span>
						</h4></div>
					</div>
					<div class="col sm-12">
						<ul class="nav personal">
							<li><a href="#">Wyłącz</a></li>
							<li><a href="#">Edytuj</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="col sm-12 md-12 lg-4 col-border">

				<div class="row no-gutters">
					<div class="col sm-12">
						<div class="mb-0"><h4>
							<strong>Sobota</strong>
							<div class="dot dot-red">Status</span>
						</h4></div>
					</div>
					<div class="col sm-12">
						<ul class="nav personal">
							<li><a href="#">Wyłącz</a></li>
							<li><a href="#">Edytuj</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div style="display: block;width:100%;"></div>

			<div class="col sm-12 md-12 lg-4 col-border">

				<div class="row no-gutters">
					<div class="col sm-12">
						<div class="mb-0"><h4>
							<strong>Niedziela</strong>
							<div class="dot dot-red">Status</span>
						</h4></div>
					</div>
					<div class="col sm-12">
						<ul class="nav personal">
							<li><a href="#">Wyłącz</a></li>
							<li><a href="#">Edytuj</a></li>
						</ul>
					</div>
				</div>

			</div>

		</div>

		<div class="col mt-3 sm-12" id="timetable-clock">
			<div class="row no-gutters">

				<div class="col sm-12">
					<div class="mb-2"><h3><strong>Dostępne godziny</strong></h3></div>

					<?php 

						$time = get_terms( 'timetable-clock' );
						
						if( ! empty( $time ) ){

							foreach( $time as $key => $values ){ 

								$edit_style = ( ! empty( $_GET['saved'] ) && $_GET['saved'] == $values->term_id ) ? 'style="background-color:#f8f9f0;"' : '';

							?>
								<div  id="timetable-time-item-<?php echo $key; ?>" style="border-bottom: 1px solid #eee;">
									
									<div class="row no-gutters" id="timetable-time-item-view" <?php echo $edit_style; ?>>
										<div class="col sm-7">
											<h5 class="pl-1" id="timetable-time-item-title" style="padding-top:4px;"><strong>
												<?php echo $values->name; ?>
											</strong></h5>
										</div>
										<div class="col sm-5" style="padding: 8px 0 6px 0;">
											<ul class="nav personal tx-r">
												<li>


		<?php 

			$url = get_permalink() . '#timetable-clock';
			$timetable = array(
				'ID' => $key,
				'item_id' => $values->term_id,
				'item_action' => 'edit',
				'item_value' => $values->name,
				'wp_nonce' => wp_create_nonce( "ubmit_timetable_clock_editor-nonce" ),
				'redirect' => add_query_arg(array(
								'page' => 'timetable'
							),
							$url)
			);

		?>
		<a href="<?php echo admin_url( "admin-post.php" ); ?>" 
		   data-item="timetable-time" 
		   timetable-time='<?php echo json_encode( $timetable ); ?>' >Edytuj</a></li>




												<li><a href="<?php echo admin_url( "admin-ajax.php" ); ?>" data-item="timetable-time" class="danger" timetable-time='{"ID": <?php echo $key; ?>, "item_id": <?php echo $values->term_id; ?>, "item_action": "delete", "security": "<?php echo wp_create_nonce( "ajax_timetable-time-nonce" )?>"}'>Usuń</a></li>
											</ul>
										</div>
									</div>

									<div id="timetable-time-item-editor" style="display:none;padding:12px;background: #f8f8f8;"></div>

								</div>
					<?php 
							}//foreach
						}else{
					?>
					
						<p>Obiecnie nie dodano godzin zajęć.</p>
					
					<?php
						}

					?>


				</div>

				<div class="col sm-12">
					<div class="mt-3 mb-1"><h4><strong>Dodaj nową godzinę</strong></h4></div>
					<form action="<?php echo admin_url("admin-post.php"); ?>" method="post">
						<input type="hidden" name="action" value="submit_timetable_clock">
						<input type="hidden" name="error" value="error_timetable-clock">
						<input type="hidden" name="redirect_url" value="<?php echo add_query_arg(array(
								'page' => 'timetable'
							),
							get_permalink()); ?>">
						<?php wp_nonce_field( 'submit_timetable_clock-nonce', 'stayfit_manager_save_timetable-clock' ); ?>

						

							<div class="form-group <?php echo Form::hasError( "error_timetable-clock", "clock" )->has_error; ?>">
								<label>Godzina : Minuta</label>
								<input type="time" id="ulica" name="timetable[clock]" placeholder="Ulica 1" value="01" min="01" max="24">
								<?php echo Form::hasError( "error_timetable-clock", "clock" )->message; ?>
							</div>
						

						<div class="form-group">
							<button type="submit" class="btn btn-primary">Zapisz</button>
						</div><!-- Zapisz -->
						<?php Form::reloadError( "error_timetable-clock" ); ?>
					</form>
				</div>

			</div>
		</div>

	</div>
</div>