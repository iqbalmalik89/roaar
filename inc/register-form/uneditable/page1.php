<h3>PERSONAL DETAILS</h3>
Please enter your personal details below

<div class='form-element'>
	<label for='fname'>
		First Name: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['fname']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='sname'>
		Surname: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['sname']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='email-confirm'>
		Email address: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['email']; ?>
	</div>
</div>

<div class='form-element'>
	
	<label for='dob'>
		Date of Birth: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['dob']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='address1'>
		Address:
	</label>
	<div class='element'>
		<?php echo $getuser->details['address1']; ?><br>
		<?php echo $getuser->details['address2']; ?><br>
		<?php echo $getuser->details['address3']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='city'>
		City/Town:
	</label>
	<div class='element'>
		<?php echo $getuser->details['city']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='county'>
		County/State:
	</label>
	<div class='element'>
		<?php echo $getuser->details['county']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='country'>
		Country:
	</label>
	<div class='element'>
		<?php echo $getuser->details['country']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='telno-code'>
		Telephone No:
	</label>
	<div class='element'>
		<?php echo $getuser->details['telno-code']; ?>
		<?php echo $getuser->details['telno-1']; ?>
		<?php echo $getuser->details['telno-2']; ?>
	</div>
</div>

<?php
if ($pagename == 'edit-profile') {
	?><a class='btn upload-video'>UPLOAD VIDEO</a>
	<a class='btn upload-documents'>UPLOAD DOCUMENTS</a>
	<a class='btn add-references'>ADD REFERENCES</a>
	<?php }
	//$getuser->displaydocs('Videos','vid');
	$getuser->displayvids(false);
	$getuser->displaydocs('Documents','doc',false);
	$getuser->displayrefs(false);
?>