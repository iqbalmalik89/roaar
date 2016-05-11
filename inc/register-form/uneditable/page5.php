<h3>FLYING EXPERIENCE</h3>
Please complete all mandatory fields. Additional experience and aircraft can be added at
the bottom of the form after you click “SAVE EXPERIENCE”. Enter at least 1 Flying
Hours to record your experience on aircraft in the “Total Hours” or “Add Experience”
sections. If you don’t have any hours flown, please enter “0”.

<?php /*
<h3>ALL AIRCRAFT TYPES</h3>

<div class='form-element'>
	<label for='all-aircraft-type'>
		Aircraft Type
	</label>
	<div class='element'>
		<select name='all-aircraft-type' id='aircraft-type'>
			<option>Select Aircraft Type</option>
		</select>
	</div>
</div>
*/ ?>

<h3>PROFICIENCY</h3>

<div class='form-element'>
	<label for='aircraft-type'>
		Aircraft Type
	</label>
	<div class='element'>
		<?php echo $getuser->details['aircraft-type']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='proficiency-check'>
		Date of Last Proficiency Check: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['proficiency-check']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='proficiency-renewal'>
		Renewal Date: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['proficiency-renewal']; ?>
	</div>
</div>

<h3>INSTRUMENT</h3>

<div class='form-element'>
	<label for='instrument-aircraft-type'>
		Aircraft Type
	</label>
	<div class='element'>
		<?php echo $getuser->details['instrument-aircraft-type']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='instrument-check'>
		Date of Last Instrument Check: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['instrument-check']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='instrument-renewal'>
		Renewal Date: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['instrument-renewal']; ?>
	</div>
</div>

<h3>LAST 6 MONTHS</h3>

<div class='form-element'>
	<label for='6months-aircraft-type'>
		Aircraft Type
	</label>
	<div class='element'>
		<?php echo $getuser->details['6months-aircraft-type']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='captain-time'>
		Captain (P1) Time: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['captain-time']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='firstofficer-time'>
		First Officer (P2) Time: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['firstofficer-time']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='instructor-time'>
		Instructor Time: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['instructor-time']; ?>
	</div>
</div>

<h3>TOTAL TIME</h3>

<div class='form-element'>
	<label for='total-captain-time'>
		Captain (P1) Time: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['total-captain-time']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='total-firstofficer-time'>
		First Officer (P2) Time: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['total-firstofficer-time']; ?>
	</div>
</div>

<div class='form-element'>
	<label for='total-instructor-time'>
		Instructor Time: *
	</label>
	<div class='element'>
		<?php echo $getuser->details['total-instructor-time']; ?>
	</div>
</div>


<h3>AIRCRAFT TYPES</h3>
Enter the details relating to your flying experience, to add addtional
aircraft, please use the Add Experience button below.

<div id='my-experiences'>
<?php
$experience = $getuser->experience;
if (!empty($experience)) {
	foreach ($experience as $exp)
	{
		?><input type="hidden" name="experienceID[]" value="<?php echo $exp['experienceID']; ?>">
		<input type="hidden" name="exp-aircraft-type[]" value="<?php echo $exp['exp-aircraft-type']; ?>">
		<input type="hidden" name="exp-captain-time[]" value="<?php echo $exp['exp-captain-time']; ?>">
		<input type="hidden" name="exp-firstofficer-time[]" value="<?php echo $exp['exp-firstofficer-time']; ?>">
		<input type="hidden" name="exp-instructor-time[]" value="<?php echo $exp['exp-instructor-time']; ?>">
		<input type="hidden" name="exp-dateoflastflight[]" value="<?php echo date('d/m/Y',strtotime($exp['exp-dateoflastflight'])); ?>">
		<div class="my-exp"> <?php echo $exp['exp-aircraft-type']; ?></div>
		<?php
	}
}
?>
</div>
