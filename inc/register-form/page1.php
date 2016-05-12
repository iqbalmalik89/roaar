<h3>PERSONAL DETAILS</h3>
Please enter your personal details below

<div class='form-element'>
	<label for='fname'>
		First Name: *
	</label>
	<div class='element'>
		<input type='text' name='fname' id='fname' placeholder='Enter your first name' value='<?php if (loggedin()) { echo $thisuser->details['fname']; } ?>'>
	</div>
</div>

<div class='form-element'>
	<label for='sname'>
		Surname: *
	</label>
	<div class='element'>
		<input type='text' name='sname' id='sname' placeholder='Enter your last name'>
	</div>
</div>

<div class='form-element'>
	<label for='email-confirm'>
		Email address: *
	</label>
	<div class='element'>
		<input type='email' name='email' id='email' placeholder='youremail@email.com'><br>
		<input type='email' name='email-confirm' id='email-confirm' placeholder='Please confirm your email address'>
	</div>
</div>

<div class='form-element'>
	
	<label for='dob'>
		Date of Birth: *
	</label>
	<div class='element'>
		<input type='text' class='datepicker' name='dob' id='dob' readonly>
	</div>
</div>

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

<div class='form-element'>
	<label for='city'>
		City/Town:
	</label>
	<div class='element'>
		<input type='text' name='city' id='city'>
	</div>
</div>

<div class='form-element'>
	<label for='county'>
		County/State:
	</label>
	<div class='element'>
		<input type='text' name='county' id='county'>
	</div>
</div>

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
			<?php require "countrycode.php"; ?>
		</select>
		<input type='text' name='telno-1' id='telno-1'>
		<input type='text' name='telno-2' id='telno-2'>
	</div>
</div>

<?php
if ($pagename == 'edit-profile') {
	?><a class='btn upload-video'>UPLOAD VIDEO</a>
	<a class='btn upload-documents'>UPLOAD DOCUMENTS</a>
	<a class='btn add-references'>ADD REFERENCES</a>
	<?php
	//$thisuser->displaydocs('Videos','vid');
	$thisuser->displayvids();
	$thisuser->displaydocs('Documents','doc');
	$thisuser->displayrefs();
}
?>