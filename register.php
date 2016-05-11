<?php
$pagetitle = "Pilot Registration";
require_once "inc/functions.php";
require_once "inc/header.php";
?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<script src='https://www.google.com/recaptcha/api.js'></script>


<div id='bg-img' style='background-image:url("img/register-bg.jpg");'></div>

<div id='register-container'>
	<div class='float-right'>
		<div id='logo'></div>
		<div id='circles'>
			<div class='full circle'></div>
			<div class='circle'></div>
			<div class='circle'></div>
			<div class='circle'></div>
			<div class='circle'></div>
			<div class='circle'></div>
			<div class='circle'></div>
			<div class='circle'></div>
		</div>
	</div>
	
	<h1>PILOT REGISTRATION</h1>
	
	<form id='register-form' method='post' class='clearfix' action='inc/register-processor.php'>
		<?php for ($x = 1; $x <= 8; $x++) { ?>
			<div id='page-<?php echo $x; ?>' style='display:none' class='register-tab'>
				<?php if (file_exists("inc/register-form/page" . $x . ".php")) { require_once "inc/register-form/page" . $x . ".php"; } ?>
			</div>
		<?php } ?>
	</form>
	
	<div id='buttons' class='float-right'><div id='buttons-inner'>
		<a class='btn' id='add-licence-button' style='display:none'>ADD ANOTHER LICENCE</a>
		<a class='btn' id='back-button' style='display:none'>BACK</a>
		<a class='btn' id='next-button' style='display:none'>NEXT</a>
		<a class='btn' id='register-button' style='display:none'>REGISTER</a>
	</div></div>
</div>

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
</script>
<?php
require_once "inc/footer.php";
?>