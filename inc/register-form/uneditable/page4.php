<h3>LICENCE INFORMATION</h3>

<h3>MEDICAL</h3>

<div class='form-element'>
	<label for='medical-date'>
		Date of Last Medical: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['medical-date']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='medical-dateexp'>
		Date of Last Medical Expiry: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['medical-dateexp']; ?>
	</div>
</div>

<?php /*
<h3>ALL LICENCE TYPES</h3>

<div class='form-element'>
	<label for='all-licence-type'>
		Licence Type: *
	</label>
	<div class='element'>
		<select name='all-licence-type' id='all-licence-type'>
			<option>Select Licence Type</option>
		</select>
	</div>
</div>
*/ ?>

<?php
$licencecount = 1;
$fillin = false;
if ($pagename == 'edit-profile' || $pagename == 'admin-view-profile' ) {
	$licencecount = count($getuser->licences);
	$fillin = true;
}
?>
<div id='all-licences'>
	<?php for ($x = 1; $x <= $licencecount; $x++) { ?>
	<div class='licence'>
		<h3>LICENCE <?php echo $x; ?> <?php if ($x > 1) { echo '<span class="remove-licence"><i class="fa fa-minus-circle"></i></span>'; } ?></h3>
		
		<input type='hidden' name='licenceID[]' value='<?php if ($fillin) { echo $getuser->licences[($x-1)]['licenceID']; ?>' class='licenceID'>

		<div class='form-element'>
			<label for='licence-no'>
				Licence Number: *
			</label>
			<div class='element'>
				<?php echo $getuser->licences[($x-1)]['licence-no']; ?>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-type'>
				Licence Type: *
			</label>
			<div class='element'>
				<?php echo $getuser->licences[($x-1)]['licence-type']; ?>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-coi'>
				Country of Issue: *
			</label>
			<div class='element'>
				<?php echo $getuser->licences[($x-1)]['licence-coi']; ?>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-typeratings'>
				Type Ratings: *
			</label>
			<div class='element'>
				<?php echo $getuser->licences[($x-1)]['licence-typeratings']; ?>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-doi'>
				Date of Issue: *
			</label>
			<div class='element'>
				<?php echo date('d/m/Y',strtotime($getuser->licences[($x-1)]['licence-doi'])); } ?>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-doe'>
				Date of Expiry: *
			</label>
			<div class='element'>
				<?php echo date('d/m/Y',strtotime($getuser->licences[($x-1)]['licence-doe'])); ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
