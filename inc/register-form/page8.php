<h3>ADDITIONAL INFORMATION</h3>
Please tell us how you heard about us and click “REGISTER” to
finish creating your account.

<h3>OTHER INFORMATION</h3>

<div class='form-element'>
	<label for='hear-about'>
		How did you hear about us? *
	</label>
	<div class='element'>
		<select name='hear-about' id='hear-about'>
			<option>Select an Option</option>
			<option>Television/radio</option>
			<option>Internet</option>
			<option>Word of mouth</option>
			<option>Friend of client</option>
			<option value='other'>Other</option>
		</select><br>
		<input type='text' name='hear-about-other' id='hear-about-other' class='other'>
	</div>
</div>

<div class='form-element'>
	<label for='misc'>
		Miscellaneous:
	</label>
	<div class='element'>
		<textarea name='misc' id='misc'></textarea>
	</div>
</div>

<?php if ($pagename == 'register') { ?>

<h3>CREATE A PASSWORD</h3>


<div class='form-element'>
	<label for='history-from'>
	</label>
	<div class='element'>
		<div id='pw-strength'>
			STRENGTH INDICATOR
		</div>
	</div>
</div>

<div class='form-element'>
	<label for='password'>
		Password: *
	</label>
	<div class='element'>
		<input type='password' name='password' id='password' placeholder='Enter a password'><br>
		<input type='password' name='password-confirm' id='password-confirm' placeholder='Please confirm your password'>
	</div>
</div>



<div class='form-element'>
	<div class="g-recaptcha" data-sitekey="6LdGERkTAAAAAPImUvkNl_5ejpPaDpYxoX9wyefA"></div>
</div>

<?php } else { ?>

<a href="edit-profile.php?deleteme=1" class="btn" onclick="return confirm('Are you sure? This is irreversible and your profile will be fully deleted.')" >Delete Profile</a>

<?php } ?>

