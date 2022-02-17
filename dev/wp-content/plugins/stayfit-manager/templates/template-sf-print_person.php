<?php

	$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();

?>
<div class="row">
	<div class="col-4">
		<div class="p-2" style="border-radius:3px;">
			<div style="text-align:center;width:100%;">
				<?php echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($_GET['id'], $generator::TYPE_EAN_8, 30, 400)) . '">'; ?>
				<p style="font-size: 18px;margin-top: 10px;">Milena kowalska</p>
				<div class="mt-3">
					<p style="margin-bottom: 0;">Login: abcd</p>
					<p style="margin-top: 0;">Hasło: abcd</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-4">
		<div class="p-2" style="border-radius:3px;height:30mm;">
			<div style="text-align:center;width:100%;">
				<?php echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($_GET['id'], $generator::TYPE_EAN_8, 30, 400)) . '">'; ?>
			</div>
		</div>
	</div>

	<div class="col-4">
		<div class="p-2" style="border-radius:3px;height:30mm;">
			<div style="text-align:center;width:100%;">
				<?php echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($_GET['id'], $generator::TYPE_EAN_8, 30, 400)) . '">'; ?>
			</div>
		</div>
	</div>

	<div class="p-2" style="width:100%;"></div>

	<div class="col-4">
		<div class="p-2" style="border-radius:3px;height:30mm;">
			<div style="text-align:center;width:100%;">
				<?php echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($_GET['id'], $generator::TYPE_EAN_8, 30, 400)) . '">'; ?>
			</div>
		</div>
	</div>
	
	<div class="col-4">
		<div class="p-2" style="border-radius:3px;height:30mm;">
			<div style="text-align:center;width:100%;">
				<?php echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($_GET['id'], $generator::TYPE_EAN_8, 30, 400)) . '">'; ?>
			</div>
		</div>
	</div>

	<div class="col-4">
		<div class="p-2" style="border-radius:3px;height:30mm;">
			<div style="text-align:center;width:100%;">
				<?php echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($_GET['id'], $generator::TYPE_EAN_8, 30, 400)) . '">'; ?>
			</div>
		</div>
	</div>

</div>
