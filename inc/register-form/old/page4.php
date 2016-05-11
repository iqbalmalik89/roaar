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


<div id='all-licences'>
	<div class='licence'>
		<h3>LICENCE 1</h3>

		<div class='form-element'>
			<label for='licence-no'>
				Licence Number: *
			</label>
			<div class='element'>
				<input type='text' name='licence-no[]' id='licence-no' placeholder='Enter a licence number'>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-type'>
				Licence Type: *
			</label>
			<div class='element'>
				<select name='licence-type[]' id='licence-type'>
					<option>Select Licence Type</option>
				</select>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-coi'>
				Country of Issue: *
			</label>
			<div class='element'>
				<select name='licence-coi[]' id='licence-coi'>
					<?php require "countrylist.php"; ?>
				</select>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-typeratings'>
				Type Ratings: *
			</label>
			<div class='element'>
				<select name='licence-typeratings[]' id='licence-typeratings'>
					<option>Select a type rating</option>
				</select>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-doi'>
				Date of Issue: *
			</label>
			<div class='element'>
				<input type='text' class='datepicker' name='licence-doi[]' id='licence-doi'>
			</div>
		</div>

		<div class='form-element'>
			<label for='licence-doe'>
				Date of Expiry: *
			</label>
			<div class='element'>
				<input type='text' class='datepicker' name='licence-doe[]' id='licence-doe'>
			</div>
		</div>
	</div>
</div>
