<h3>INSTRUCTOR TRAINING</h3>
If you have any instructor training experience, please add it below. If you do not have
instructor training experience, just click “NEXT” to continue.

<div id='my-instructor-experiences'>
<?php
$instructorexperience = $getuser->instructorexperience;
if (!empty($instructorexperience)) {
	foreach ($instructorexperience as $exp)
	{
		?>
		<input type="hidden" name="instr-experienceID[]" value="<?php echo $exp['instr-experienceID']; ?>">
		<input type="hidden" name="instr-exp-instructor-aircraft-type[]" value="<?php echo $exp['instr-exp-instructor-aircraft-type']; ?>">
		<input type="hidden" name="instr-exp-training-type[]" value="<?php echo $exp['instr-exp-training-type']; ?>">
		<input type="hidden" name="instr-exp-airline-company[]" value="<?php echo $exp['instr-exp-airline-company']; ?>">
		<div class="my-instr-exp"> <?php echo $exp['instr-exp-instructor-aircraft-type']; ?></div>
		<?php
	}
}
?>
</div>
