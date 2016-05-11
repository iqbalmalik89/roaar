<h3>EMPLOYMENT HISTORY</h3>
Please fill in your latest employment history. Additional employment
experience may be added after you click on the “SAVE EXPERIENCE”
button.

<div id='my-emp-experiences'>
<?php
$history = $getuser->history;
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
		<div class="my-emp-exp"> <?php echo $exp['exp-history-airline-company']; ?></div>
		<?php
	}
}
?>
</div>
