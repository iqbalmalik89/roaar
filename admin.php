<?php
$pagetitle = "Admin";
$needloggedin = true;
$needadmin = true;

require_once "inc/functions.php";
require_once "inc/header.php";

?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/croppic.css">
<?php /*<script src='https://www.google.com/recaptcha/api.js'></script>*/ ?>

<a href='inc/logout.php'>Logout</a>


<div id='bg-img' style='background-image:url("img/register-bg.jpg");'></div>

<div id="admin-tabs">
	<div class="tab active">
		PILOTS
	</div>
	<div class="tab">
		AIRLINES
	</div>
	<div class="tab">
		EMAILS
	</div>
	<div class="tab">
		CHANGE PASSWORD
	</div>
</div>
<div id='register-container'>
	<div class='mobile-only'>
		<div id='open-menu' class='btn'>Menu</div>
		<div id='circles'>
			<div class='small btn tab'>PILOTS</div>
			<div class='small btn tab'>AIRLINES</div>
			<div class='small btn tab'>EMAILS</div>
			<div class='small btn tab'>CHANGE PASSWORD</div>
		</div>
	</div>
	<div id="pilot-tab">
		<input type="text" id="pilot-search" placeholder="Search for pilot..."><div id="loader" class="ajax-spinner"></div>
		
		<div id="all-pilots">
		<?php
		$sql = "SELECT * FROM `user` WHERE pilot=1 ORDER BY userID ASC;";
		if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		
		$counter = 1;
		while ($row = $result->fetch_array())
		{
			?>
			<div class="pilot-row">
				<div class="pilot-number">
					<?php echo $row['userID']; ?>.
				</div>
				<div class="pilot-name">
					<?php echo $row['fname'] . " " . $row['sname']; ?>
				</div>
				<div class="pilot-button">
					<a class="btn" href="admin-view-profile.php?user=<?php echo $row['userID']; ?>">View<br>Profile</a>
				</div>
				<div class="pilot-button">
					<a class="btn send-email-1">Airline<br>Interested</a>
				</div>
				<div class="pilot-button">
					<a class="btn send-email-2">Interview<br>Requested</a>
				</div>
				<input type="hidden" name="userid" value="<?php echo $row['userID']; ?>">
				
			</div>
			<?php
			$counter++;
		}
		?>
		</div>
	</div>
	<div id="airlines-tab" style="display:none">
		airlines...
	</div>
	<div id="emails-tab" style="display:none">
		<?php
		$sql = "SELECT * FROM `email`;";
		if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		
		$counter = 1;
		while ($row = $result->fetch_array()) {
		?>
		<div class="pilot-button email-button" style="display:inline-block;">
			<a class="btn"><?php echo $row['name']; ?></a>
			<input type="hidden" name="id" value="<?php echo $row['emailID']; ?>">
			<input type="hidden" name="subject" value="<?php echo $row['subject']; ?>">
			<input type="hidden" name="message" value="<?php echo $row['message']; ?>">
		</div>
		<?php } ?>
		
		<form class='edit-email' style='display:none' method="post">
			<h2>Airline Interested</h2>
			
			<input type="hidden" name="email-id" id="email-id" value="1">
			
			<div class='form-element'>
				<label for='subject-line'>
					Subject Line:
				</label>
				<div class='element'>
					<input type='text' name='subject-line' id='subject-line'>
				</div>
			</div>

			<div class='form-element'>
				<label for='message'>
					Message:
				</label>
				<div class='element'>
					<textarea name="message" id="message"></textarea>
				</div>
			</div>
			
			<div class='form-element'>
				<label for='message'>
					
				</label>
				<div class='element' style="text-align:right;">
					<div class='ajax-loader' style="display:inline-block;"></div>
					<div class="pilot-button" style="display:inline-block;">
						<a class="btn edit-btn">Edit</a>
					</div><div class="pilot-button" style="display:inline-block;">
						<a class="btn save-btn">Save</a>
					</div>
				</div>
			</div>
			
			Possible codes that can be used are [fname], [sname], [email], [dob], etc.
		</form>
	</div>
	<div id="change-password-tab" style="display:none">

		<form method="post" id='change-pw-form'>
			<div class='form-element'>
				<label for='new-password'>
					New Password:
				</label>
				<div class='element'>
					<input type="password" name="new-password" id="new-password">
				</div>
			</div>

			<div class='form-element'>
				<label for='confirm-password'>
					Confirm:
				</label>
				<div class='element'>
					<input type="password" name="confirm-password" id="confirm-password">
				</div>
			</div>

			<div class='form-element'>
				<label for=''>
					
				</label>
				<div class='element'>
					<input type="submit">
				</div>
			</div>
		</form>
	</div>
</div>

<script>
<?php
if (isset($_POST['new-password']))
{
	$sql = "UPDATE `user` SET password='" . sha1($_POST['new-password']) . "' WHERE userID='" . $_SESSION['roaarloggedin'] . "' AND admin=1;";
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	
	?>
	$( '.tab' ).removeClass('active');
	$( '.tab:nth-child(4)' ).addClass('active');
	$( '#register-container > div:not(.mobile-only)' ).hide();
	$( '#register-container > #change-password-tab' ).show();
	$( '#register-container > #change-password-tab' ).prepend("PASSWORD UPDATED!");
	<?php
}
?>
$( '#open-menu' ).click( function() {
	if ( $( '.mobile-only #circles' ).is(':visible'))
	{
		$( '.mobile-only #circles' ).fadeOut();
	}
	else
	{
		$( '.mobile-only #circles' ).fadeIn();
	}
});


$( '#pilot-search' ).keyup(function() {
	$( '#loader' ).css('display','inline-block');
	
	$.get( "inc/pilot-search.php", { srch: $('#pilot-search').val() } )
	.done(function( data ) {
		$( "#all-pilots" ).html( data );
		$( '#loader' ).css('display','none');
	});
});

$( '.tab' ).click( function() {
	
	var thetab = $( this );
	var theindex = $( this ).index()+2;
	
	$( '.mobile-only #circles' ).fadeOut(200);
	
	$( '#register-container > div:visible:not(.mobile-only)' ).fadeOut(200, function() {
		$( '.tab' ).removeClass('active');
		$( thetab ).addClass('active');
		
		$( '#register-container > div:nth-child(' + theindex + ')').fadeIn(200);
	});
});


$( '.email-button .btn' ).click( function() {
	$( "#email-id" ).val( $( this ).parent().find('input[name="id"]').val() );
	$( "#subject-line" ).val( $( this ).parent().find('input[name="subject"]').val() );
	$( "#message" ).val( $( this ).parent().find('input[name="message"]').val() );
	
	$( "#subject-line" ).attr('disabled','disabled');
	$( "#message" ).attr('disabled','disabled');
	
	$( ".edit-email h2" ).html( $( this ).html() );
	
	$( '.edit-email' ).show();
});

$( '.edit-btn' ).click( function() {
	$( "#subject-line" ).removeAttr('disabled');
	$( "#message" ).removeAttr('disabled');
});

$( '.save-btn' ).click( function() {
	$( '#emails-tab .ajax-loader' ).show();
	$.post( "inc/update-emails.php", { id: $( "#email-id" ).val(), subject: $( "#subject-line" ).val(), message: $( "#message" ).val() })
	.done(function( data ) {
		$( '#emails-tab .ajax-loader' ).hide();
		$( "#subject-line" ).attr('disabled','disabled');
		$( "#message" ).attr('disabled','disabled');
		
		$( ".email-button" ).each( function() {
			if( $( this ).find('input[name="id"]').val() == $( "#email-id" ).val() ) {
				$( this ).find('input[name="subject"]').val( $( "#subject-line" ).val() );
				$( this ).find('input[name="message"]').val( $( "#message" ).val() );
			}
		});
	});
});

$( '.send-email-1' ).click( function() {
	var emailid=1;
	var userid=$( this ).closest('.pilot-row').find('input[name="userid"]').val();
	$.post( "inc/send-email.php", { emailid: emailid, userid: userid })
	.done(function( data ) {
		alert( data );
	});
});

$( '.send-email-2' ).click( function() {
	var emailid=2;
	var userid=$( this ).closest('.pilot-row').find('input[name="userid"]').val();
	$.post( "inc/send-email.php", { emailid: emailid, userid: userid })
	.done(function( data ) {
		alert( data );
	});
});

$( '#change-pw-form' ).submit( function(e) {
	if ($( '#new-password' ).val() != $( '#confirm-password' ).val() )
	{
		alert("Passwords don't match");
		e.preventDefault();
	}
});
</script>
<?php
require_once "inc/footer.php";
?>