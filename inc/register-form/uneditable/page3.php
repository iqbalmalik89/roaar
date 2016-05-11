<h3>PASSPORT DETAILS</h3>

<h3>PASSPORT 1</h3>
Please enter your first passport details below

<div class='form-element'>
	<label for='passport1-no'>
		Passport Number: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['passport1-no']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='passport1-country'>
		Country of issue: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['passport1-country']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='passport1-date'>
		Date of issue: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['passport1-date']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='passport1-expiry'>
		Date of expiry: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['passport1-expiry']; ?>
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
		<?php echo $getuser->details['passport2-no']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='passport2-country'>
		Country of issue: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['passport2-country']; ?>
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
		<?php echo $getuser->details['passport2-expiry']; ?>
	</div>
</div>
