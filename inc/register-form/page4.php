<h3>LICENCE INFORMATION</h3>

<h3>MEDICAL</h3>

<div class='form-element'>
	<label for='medical-date'>
		Date of Last Medical: *
	</label>
	<div class='element'>
		<input type='text' class='datepicker' name='medical-date' id='medical-date'>
	</div>
</div>

<div class='form-element'>
	<label for='medical-dateexp'>
		Date of Last Medical Expiry: *
	</label>
	<div class='element'>
		<input type='text' class='datepicker' name='medical-dateexp' id='medical-dateexp'>
	</div>
</div>
<style>
.hideClass{
display: block !important;
}
</style>
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
if ($pagename == 'edit-profile') {
	$licencecount = count($thisuser->licences);
	$fillin = true;
}
?>
<div id='all-licences'>
	<?php for ($x = 1; $x <= $licencecount; $x++) { ?>
	<div class='licence'>
		<h3>LICENCE <?php echo $x; ?> <?php if ($x > 1) { echo '<span class="remove-licence"><i class="fa fa-minus-circle"></i></span>'; } ?></h3>
		
		<input type='hidden' name='licenceID[]' value='<?php if ($fillin) { echo $thisuser->licences[($x-1)]['licenceID']; } ?>' class='licenceID'>

		<div class='form-element'>
			<label for='licence-no'>
				Licence Number: *
			</label>
			<div class='element'>
				<input type='text' name='licence-no[]' id='licence-no-id-<?php echo $x; ?>' placeholder='Enter a licence number' value="<?php if ($fillin) { echo $thisuser->licences[($x-1)]['licence-no']; } ?>">
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-type'>
				Licence Type: *
			</label>
			<div class='element'>
				<select name='licence-type[]' id='licence-type-id-<?php echo $x; ?>'>
					<option>Select Licence Type</option>
					<option>FAA ATPL</option>
					<option>CAAC ATPL</option>
 					<option>JAR ATPL</option>
 					<option>JAA ATPL</option>
				</select>
				<?php if ($fillin) { ?>
				<script>
				$( '#licence-type-id-<?php echo $x; ?>' ).val( "<?php echo $thisuser->licences[($x-1)]['licence-type']; ?>" );
				</script>
				<?php } ?>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-coi'>
				Country of Issue: *
			</label>
			<div class='element'>
				<select name='licence-coi[]' id='licence-coi-id-<?php echo $x; ?>'>
					<?php require "countrylist.php"; ?>
				</select>
				<?php if ($fillin) { ?>
				<script>
				$( '#licence-coi-id-<?php echo $x; ?>' ).val( "<?php echo $thisuser->licences[($x-1)]['licence-coi']; ?>" );
				</script>
				<?php } ?>
			</div>
		</div>

		<div class='form-element'>
			<label for='supplied-name'>
				Supplied Name: *
			</label>
			<div class='element'>
				<select name='supplied-name[]' id='supplied-name-id-<?php echo $x; ?>'>
					<option>Select Supplied Name</option>
					<option>Passengers</option>
					<option>Freighters</option>
 					<option>Combine</option>
 					
				</select>
				<?php if ($fillin) { ?>
				<script>
				$( '#supplied-name-id-<?php echo $x; ?>' ).val( "<?php echo $thisuser->licences[($x-1)]['supplied-name']; ?>" );
				</script>
				<?php } ?>
			</div>
		</div>


		<div class='form-element'>
			<label for='licence-typeratings'>
				Type Ratings: *
			</label>
			<div class='element'>
				<select multiple name='licence-typeratings[]' id='licence-typeratings-id-<?php echo $x; ?>'>
					<option>Select a type rating</option>
					<?php require "typerating.php"; ?>
				</select>
				<?php if ($fillin) { ?>
				<script>
				$( '#licence-typeratings-id-<?php echo $x; ?>' ).val( "<?php echo $thisuser->licences[($x-1)]['licence-typeratings']; ?>" );
				</script>
				<?php } ?>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-doi'>
				Date of Issue: *
			</label>
			<div class='element'>
				<input type='text' class='datepicker' name='licence-doi[]' id='licence-doi-id-<?php echo $x; ?>' value="<?php if ($fillin) { echo date('d/m/Y',strtotime($thisuser->licences[($x-1)]['licence-doi'])); } ?>">
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-expire' style="width:12px;">
				<?php
				
				$check="";
				$class_add = '';
				
				if($fillin) {
						 if($thisuser->licences[($x-1)]['license_expire']==1){
						 	$class_add= 'hideClass';
						 	$check = "checked";
						 	
					 	
						 }
					}


				?>
				<input  class='hide_this' onclick="expiryCheck(this, <?php echo $x ;?>);" type='checkbox'  style="width:12px;" name='license_expire[]' id='license_expire-<?php echo $x; ?>' value="1"   <?php echo $check;?>>				
			</label>Does your license have an expiry date?
			<div class='element'>

			</div>
		</div>


		<div class='form-element licenseexpire <?php echo $class_add;?>' style="display:none;" id="licenseexp<?php echo $x; ?>">
			<label for='licence-doe'>
				Date of Expiry: *
			</label>
			<div class='element'>
				<input type='text' class='datepicker' name='licence-doe[]' id='licence-doe-id-<?php echo $x; ?>' value="<?php if ($fillin) { echo date('d/m/Y',strtotime($thisuser->licences[($x-1)]['licence-doe'])); } ?>">
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<script type="text/javascript">
	function expiryCheck(obj, x)
	{
		if($(obj).is(":checked"))
			$(obj).parent().parent().next().show();
		else
			$(obj).parent().parent().next().hide();
	}
</script>