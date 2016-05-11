<h3>EMPLOYMENT HISTORY</h3>
Please fill in your latest employment history. Additional employment
experience may be added after you click on the “SAVE EXPERIENCE”
button.

<div id='my-emp-experiences'>
<?php
$history = $thisuser->history;
if (!empty($history)) {
	foreach ($history as $exp)
	{
		?>
		<input type="hidden" name="historyID[]" value="<?php echo $exp['historyID']; ?>">
		<input type="hidden" name="exp-history-airline-company[]" value="<?php echo $exp['exp-history-airline-company']; ?>">
		<input type="hidden" name="exp-history-from[]" value="<?php echo date('d/m/Y',strtotime($exp['exp-history-from'])); ?>">
		<input type="hidden" name="exp-history-to[]" value="<?php echo date('d/m/Y',strtotime($exp['exp-history-to'])); ?>">
		<input type="hidden" name="exp-history-position[]" value="<?php echo $exp['exp-history-position']; ?>">
		<input type="hidden" name="exp-history-leaving[]" value="<?php echo $exp['exp-history-leaving']; ?>">
		<div class="my-emp-exp"><span class="remove-emp-exp"><i class="fa fa-minus-circle"></i></span> <?php echo $exp['exp-history-airline-company']; ?></div>
		<?php
	}
}
?>
</div>

<h3>ADD EMPLOYMENT EXPERIENCE</h3>

<div class='form-element'>
	<label for='history-airline-company'>
		Airline/Company: *
	</label>
	<div class='element not-required'>
		<?php /*<select name='history-airline-company' id='history-airline-company'>
			<option>Select an Option</option>
			<option value='other'>Other</option>
		</select><br>
		<input type='text' name='history-airline-company-other' id='history-airline-company-other' class='other'>*/ ?>
		<input type='text' name='history-airline-company' id='history-airline-company' value='<?php if (loggedin()) { echo $thisuser->details['history-airline-company']; } ?>'>
	</div>
</div>

<?php /*
<div class='form-element italic'>
	If your company is not listed, please choose “Other” and enter it
	in the box that appears below.
</div>
*/ ?>

<div class='form-element'>
	<label for='history-from'>
		From: *
	</label>
	<div class='element not-required'>
		<input type='text' class='datepicker' name='history-from' id='history-from'>
	</div>
</div>

<div class='form-element'>
	<label for='history-to'>
		To:
	</label>
	<div class='element not-required'>
		<input type='text' class='datepicker' name='history-to' id='history-to'>
	</div>
</div>

<div class='form-element'>
	<label for='history-position'>
		Position: *
	</label>
	<div class='element not-required'>
		<?php /*<select name='history-position' id='history-position'>
			<option>Select your Position</option>
		</select>*/ ?>
		<input type='text' name='history-position' id='history-position' value='<?php if (loggedin()) { echo $thisuser->details['history-position']; } ?>'>
	</div> 
</div>

<div class='form-element'>
	<label for='history-leaving'>
		Reason For Leaving: *
	</label>
	<div class='element not-required'>
		<textarea name='history-leaving' id='history-leaving'></textarea>
	</div> 
</div>

<a class='btn save-emp-experience float-right' style='margin-right:10px;'>SAVE EXPERIENCE</a>
