<?php
function outputtextfield($thisuser,$id,$label,$type='text',$placeholder='',$class='')
{
	?><div class='form-element'>
		<label for='<?php echo $id; ?>'>
			<?php echo $label; ?>
		</label>
		<div class='element'>
			<input type='<?php echo $type; ?>' name='<?php echo $id; ?>' id='<?php echo $id; ?>' placeholder='Enter your first name' class='<?php echo $class; ?>' value="<?php if (loggedin()) { echo $thisuser->details[$id]; } ?>">
		</div>
	</div><?php
}
?>