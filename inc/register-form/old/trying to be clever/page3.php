<h3>PASSPORT DETAILS</h3>

<h3>PASSPORT 1</h3>
Please enter your first passport details below

<div class='form-element'>
	<label for='passport1-no'>
		Passport Number: *
	</label>
	<div class='element'>
		<input type='text' name='passport1-no' id='passport1-no' placeholder='Enter a Passport Number'>
	</div>
</div>

<div class='form-element'>
	<label for='passport1-country'>
		Country of issue: *
	</label>
	<div class='element'>
		<select name='passport1-country' id='passport1-country'>
			<?php require "countrylist.php"; ?>
		</select>
	</div>
</div>

<div class='form-element'>
	<label for='passport1-date'>
		Date of issue: *
	</label>
	<div class='element'>
		<input type='text' class='datepicker' name='passport1-date' id='passport1-date'>
	</div>
</div>

<div class='form-element'>
	<label for='passport1-expiry'>
		Date of expiry: *
	</label>
	<div class='element'>
		<input type='text' class='datepicker' name='passport1-expiry' id='passport1-expiry'>
	</div>
</div>

<?php /*********************************************************************/ ?>

<h3>PASSPORT 2</h3>
Please enter your first passport details below

<div class='form-element'>
	<label for='passport2-no'>
		Passport Number: *
	</label>
	<div class='element'>
		<input type='text' name='passport2-no' id='passport2-no' placeholder='Enter a Passport Number'>
	</div>
</div>

<div class='form-element'>
	<label for='passport2-country'>
		Country of issue: *
	</label>
	<div class='element'>
		<select name='passport2-country' id='passport2-country'>
			<?php require "countrylist.php"; ?>
		</select>
	</div>
</div>

<div class='form-element'>
	<label for='passport2-date'>
		Date of issue: *
	</label>
	<div class='element'>
		<input type='text' class='datepicker' name='passport2-date' id='passport2-date'>
	</div>
</div>

<div class='form-element'>
	<label for='passport2-expiry'>
		Date of expiry: *
	</label>
	<div class='element'>
		<input type='text' class='datepicker' name='passport2-expiry' id='passport2-expiry'>
	</div>
</div>
