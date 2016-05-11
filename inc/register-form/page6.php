<h3>INSTRUCTOR TRAINING</h3>
If you have any instructor training experience, please add it below. If you do not have
instructor training experience, just click “NEXT” to continue.

<div id='my-instructor-experiences'>
<?php
$instructorexperience = $thisuser->instructorexperience;
if (!empty($instructorexperience)) {
	foreach ($instructorexperience as $exp)
	{
		?>
		<input type="hidden" name="instr-experienceID[]" value="<?php echo $exp['instr-experienceID']; ?>">
		<input type="hidden" name="instr-exp-instructor-aircraft-type[]" value="<?php echo $exp['instr-exp-instructor-aircraft-type']; ?>">
		<input type="hidden" name="instr-exp-training-type[]" value="<?php echo $exp['instr-exp-training-type']; ?>">
		<input type="hidden" name="instr-exp-airline-company[]" value="<?php echo $exp['instr-exp-airline-company']; ?>">
		<div class="my-instr-exp"><span class="remove-instr-exp"><i class="fa fa-minus-circle"></i></span> <?php echo $exp['instr-exp-instructor-aircraft-type']; ?></div>
		<?php
	}
}
?>
</div>

<h3>ADD INSTRUCTOR EXPERIENCE</h3>

<div class='form-element'>
	<label for='instructor-aircraft-type'>
		Aircraft Type
	</label>
	<div class='element not-required'>
		<select name='instructor-aircraft-type' id='instructor-aircraft-type'>
			<option>Select Aircraft Type</option>
			<?php require "typerating.php"; ?>
		</select>
	</div>
</div>

<div class='form-element'>
	<label for='training-type'>
		Type of Training: *
	</label>
	<div class='element not-required'>
		<select name='training-type' id='training-type'>
			<option>Select Type of Training</option>
			<option>Ground Instructor</option>
			<option>Sim Instructor</option>
			<option>Line Check Captain</option>
		</select>
	</div>
</div>

<div class='form-element'>
	<label for='airline-company'>
		Airline/Company: *
	</label>
	<div class='element not-required'>
		<select name='airline-company' id='airline-company'>
			<option>Select an option</option>
			<option>Part 121</option>
			<option>Part 135</option>
			<option value='other'>Other</option>
		</select><br>
		<input type='text' name='airline-company-other' id='airline-company-other' class='other'>
	</div>
</div>

<div class='form-element italic'>
	If your company is not listed, please choose “Other” and enter it
	in the box that appears below. 
</div>

<a class='btn save-instructor-experience float-right' style='margin-right:10px;'>SAVE EXPERIENCE</a>
