<?php
$pagetitle = "Edit Profile";
$needloggedin = true;

require_once "inc/functions.php";
require_once "inc/header.php";

?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/croppic.css">
<?php /*<script src='https://www.google.com/recaptcha/api.js'></script>*/ ?>

<a href='inc/logout.php'>Logout</a>


<div id='bg-img' style='background-image:url("img/register-bg.jpg");'></div>

<div id='register-container'>
	<div class='float-left'>
		<div id='logo'></div>
	</div>
	<div class='mobile-only'>
		<div id='open-menu' class='btn'>Menu</div>
	</div>
	<div id='circles'>
		<div class='small btn'>Personal Details</div>
		<div class='small btn'>Contract Type</div>
		<div class='small btn'>Passport Details</div>
		<div class='small btn'>Licence Details</div>
		<div class='small btn'>Flying Experience</div>
		<div class='small btn'>Instructor Training</div>
		<div class='small btn'>Employment History</div>
		<div class='small btn'>Additional Information</div>
	</div>
	
	<form id='register-form' method='post' class='clearfix' action='inc/register-processor.php'>
		<div style='float:left; width:264px;'>
			<div id='profile-pic'>
				<div class='update-prof-pic btn'>UPDATE</div>
			</div>
			<div id='edit-buttons'>
				<a class='btn' id='add-licence-button' style='display:none'>ADD ANOTHER LICENCE</a>
				<?php /* <a class='btn' id='back-button' style='display:none'>BACK</a>
				<a class='btn' id='next-button' style='display:none'>NEXT</a>
				<a class='btn' id='register-button' style='display:none'>REGISTER</a> */ ?>
				<a class='btn' id='update-button'>UPDATE INFO</a>
			</div>
		</div>
		<?php for ($xo = 1; $xo <= 8; $xo++) { ?>
			<div id='page-<?php echo $xo; ?>' style='display:none' class='register-tab'>
				<?php if (file_exists("inc/register-form/page" . $xo . ".php")) { require_once "inc/register-form/page" . $xo . ".php"; } ?>
			</div>
		<?php } ?>
		<input type='hidden' name='edit' value='1'>
	</form>
	

</div>



<?php /*
<script src="js/croppic.min.js"></script>
<script>
	var croppicHeaderOptions = {
				uploadUrl:'img_save_to_file.php',
				cropUrl:'img_crop_to_file.php'
	}
	var cropperHeader = new Croppic('profile-pic',croppicHeaderOptions);
</script>


#cropContainerHeader {
	width: 150px;
	height: 200px;
	position:relative;
}


*/ ?>
<style>
#profile-pic {
	width: 150px;
	height: 200px;
	position: relative;
	border: 7px solid #000;
	background: #fff;
	float: left;
	margin-right:100px;
	background-image:url('jquery_upload_crop/upload_pic/<?php echo $thisuser->details['profile-pic']; ?>');
	background-size:cover;
	background-position:center;
}
</style>

<script src="js/register-form.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script>
$( ".datepicker" ).datepicker({
	changeMonth: true,
	changeYear: true,
	dateFormat: "dd/mm/yy",
	showOn: "button",
	buttonText: "<i class='fa fa-calendar'></i>"
});

$( ".datepicker" ).attr("placeholder","dd/mm/yyyy");

$( "#dob" ).datepicker( "option", "yearRange", "<?php echo (date("Y")-100); ?>:<?php echo (date("Y")-10); ?>" );

<?php foreach ($thisuser->details as $key => $val) { ?>
	<?php $val = str_replace('"',"'",$val); ?>
	<?php if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$val)) {
		$val = date('d/m/Y',strtotime($val));
	} ?>
	$( '#<?php echo $key; ?>' ).val( "<?php echo $val; ?>" );
<?php } ?>
$( '#email-confirm' ).val( "<?php echo $thisuser->details['email']; ?>" );
$( '#password-confirm' ).val( "<?php echo $thisuser->details['password']; ?>" );


<?php /*
for ($i = 0; $i < count($thisuser->licences); ++$i) { ?>
	$( '#licence-no-<?php echo ($i+1); ?>' ).val( '<?php echo $thisuser->licences[$i]['licence-no']; ?>' );
	$( '#licence-type-<?php echo ($i+1); ?>' ).val( '<?php echo $thisuser->licences[$i]['licence-type']; ?>' );
	$( '#licence-coi-<?php echo ($i+1); ?>' ).val( '<?php echo $thisuser->licences[$i]['licence-coi']; ?>' );
	$( '#licence-typeratings-<?php echo ($i+1); ?>' ).val( '<?php echo $thisuser->licences[$i]['licence-typeratings']; ?>' );
	$( '#licence-doi-<?php echo ($i+1); ?>' ).val( '<?php echo date('d/m/Y',strtotime($thisuser->licences[$i]['licence-doi'])); ?>' );
	$( '#licence-doe-<?php echo ($i+1); ?>' ).val( '<?php echo date('d/m/Y',strtotime($thisuser->licences[$i]['licence-doe'])); ?>' );
<?php } */ ?>


checkpwstrength();
</script>
<?php
require_once "inc/footer.php";
?>