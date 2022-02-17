<div id="screen">
	<div class="row no-gutters">
		<div class="col sm-12">
			<div class="site-content">
				<form action="<?php echo admin_url("admin-post.php"); ?>" method="post">

						<input type="hidden" name="action" value="submit_general_options">
						<input type="hidden" name="error" value="error_general-options">
						<input type="hidden" name="redirect_url" value="<?php echo get_permalink(); ?>">
						<?php wp_nonce_field( 'submit_general_options-nonce', 'stayfit_manager_save_options-general' ); ?>

						<header class="mb-1"><h3><strong>O nas</strong></h3></header>

						<div class="form-group <?php echo Form::hasError( "error_general-options", "site/description" )->has_error; ?>">
							<textarea type="text" id="o-nas" name="options[site][description]" placeholder="Opis" rows="10"><?php echo StayFit_Theme_Options::Get('site/description'); ?></textarea>
							<?php echo Form::hasError( "error_general-options", "site/description" )->message; ?>
						</div><!-- O nas -->

						<header class="mt-2 mb-1"><h3><strong>Lokalizacja</strong></h3></header>

						<div class="row no-gutters">
							
								<!-- Ulica && Numer lokalu -->
								<div class="form-group col sm-8 <?php echo Form::hasError( "error_general-options", "site/location/street" )->has_error; ?>">
									<label>Ulica</label>
									<input type="text" id="ulica" name="options[site][location][street]" placeholder="Ulica 1" value="<?php echo StayFit_Theme_Options::Get('site/location/street'); ?>">
									<p class="form-input-label"></p>
									<?php echo Form::hasError( "error_general-options", "site/location/street" )->message; ?>
								</div>
								<div class="form-group col sm-3 sm-offset-1 <?php echo Form::hasError( "error_general-options", "site/location/place_no" )->has_error; ?>">
									<label>Numer lokalu</label>
									<input type="text" id="nr-lokal" name="options[site][location][place_no]" placeholder="2" value="<?php echo StayFit_Theme_Options::Get('site/location/place_no'); ?>">
									<?php echo Form::hasError( "error_general-options", "site/location/place_no" )->message; ?>
								</div>

							</div><!-- Ulica && Numer lokalu -->
							<div class="row no-gutters">

								<!-- Kod pocztowy && Miejscowość -->
								<div class="form-group col sm-4 <?php echo Form::hasError( "error_general-options", "site/location/postal_code" )->has_error; ?>">
									<label>Kod pocztowy</label>
									<input type="text" id="post-code" name="options[site][location][postal_code]" placeholder="15-001" value="<?php echo StayFit_Theme_Options::Get('site/location/postal_code'); ?>">
									<?php echo Form::hasError( "error_general-options", "site/location/postal_code" )->message; ?>
								</div>
								<div class="form-group col sm-7 sm-offset-1 <?php echo Form::hasError( "error_general-options", "site/location/city" )->has_error; ?>">
									<label>Miejscowość</label>
									<input type="text" id="city" name="options[site][location][city]" placeholder="Białystok" value="<?php echo StayFit_Theme_Options::Get('site/location/city'); ?>">
									<?php echo Form::hasError( "error_general-options", "site/location/city" )->message; ?>
								</div><!-- Kod pocztowy && Miejscowość -->

						</div><!-- Lokalizacja -->


						<header class="mt-2 mb-1"> <h3>Media społecznościowe</h3> </header>

						<div class="form-group <?php echo Form::hasError( "error_general-options", "socials/fb/url" )->has_error; ?>">				
							<!-- Facebook -->
							<label>Facebook</label>
							<input type="text" id="url-fb" name="options[socials][fb][url]" placeholder="Identyfikator strony" value="<?php echo StayFit_Theme_Options::Get('socials/fb/url'); ?>">
							<?php echo Form::hasError( "error_general-options", "socials/fb/url" )->message; ?>
						</div><!-- Media społecznościowe -->

						<header class="mt-2 mb-1"><h3>Kontakt</h3></header>
						<div class="form-group">
							<!-- Numer telefony -->
							<div class="form-group col sm-12 <?php echo Form::hasError( "error_general-options", "site/contact/phone_number" )->has_error; ?>">
								<label>Numer telefonu</label>
								<input type="text" id="nr-tel" name="options[site][contact][phone_number]" placeholder="+48 123 456 789" value="<?php echo StayFit_Theme_Options::Get('site/contact/phone_number'); ?>">
								<?php echo Form::hasError( "error_general-options", "site/contact/phone_number" )->message; ?>
							</div>
							<!-- Numer telefony -->
							<div class="form-group col sm-12 <?php echo Form::hasError( "error_general-options", "site/contact/email" )->has_error; ?>">
								<label>Adres e-mail</label>
								<input type="text" id="adres-email" name="options[site][contact][email]" placeholder="nazwa@serwis.pl" value="<?php echo StayFit_Theme_Options::Get('site/contact/email'); ?>">
								<?php echo Form::hasError( "error_general-options", "site/contact/email" )->message; ?>
							</div>
						</div><!-- Kontakt -->

						<div class="form-group mt-2">
							<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
						</div><!-- Zapisz -->
						<?php Form::reloadError( "error_general-options" ); ?>
					</form>
			</div>
		</div>
	</div>
</div>