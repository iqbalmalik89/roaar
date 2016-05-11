<h3>PERSONAL DETAILS</h3>
Please enter your personal details below

<?php outputtextfield($thisuser,'fname','First Name: *','text','Enter your first name'); ?>

<?php outputtextfield($thisuser,'sname','Surname: *','text','Enter your last name'); ?>

<div class='form-element'>
	<label for='email-confirm'>
		Email address: *
	</label>
	<div class='element'>
		<input type='email' name='email' id='email' placeholder='youremail@email.com'><br>
		<input type='email' name='email-confirm' id='email-confirm' placeholder='Please confirm your email address'>
	</div>
</div>

<?php outputtextfield($thisuser,'dob','Date of Birth: *','text','','datepicker'); ?>

<div class='form-element'>
	<label for='address1'>
		Address:
	</label>
	<div class='element'>
		<input type='text' name='address1' id='address1'><br>
		<input type='text' name='address2' id='address2'><br>
		<input type='text' name='address3' id='address3'>
	</div>
</div>

<?php outputtextfield($thisuser,'city','City/Town:'); ?>

<?php outputtextfield($thisuser,'county','County/State:'); ?>

<div class='form-element'>
	<label for='country'>
		Country:
	</label>
	<div class='element'>
		<select name='country' id='country'>
			<?php require "countrylist.php"; ?>
		</select>
	</div>
</div>

<div class='form-element'>
	<label for='telno-code'>
		Telephone No:
	</label>
	<div class='element'>
		<select name='telno-code' id='telno-code'>
			<option>Code</option>
		</select>
		<input type='text' name='telno-1' id='telno-1'>
		<input type='text' name='telno-2' id='telno-2'>
	</div>
</div>