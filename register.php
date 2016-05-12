<?php
$pagetitle = "Pilot Registration";
require_once "inc/functions.php";
require_once "inc/header.php";
?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
.msg_cancel, .msg_ok, .msg_error {
    background-color: #f2dede !important;
    border-radius: 5px !important;
    border: 1px solid #eed3d7 !important;
    clear: both !important;
    color: #b94a48 !important;
    display: block !important;
    font: 700 12px/14px arial !important;
    margin: -3px 0 10px !important;
    padding: 6px 0.5% !important;
    text-align: center !important;
    width: 50%;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5 !important);
}
.msg_cancel ul, .msg_ok ul, .msg_error ul {
    margin: 0;
}
.msg_cancel li, .msg_ok li, .msg_error li {
    list-style: initial;
    margin-left: 21px;
    text-align: left;
}
</style>

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
	<div id="msgs" class="msgs"></div>
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
$( "#history-from" ).datepicker( "option", "yearRange", "<?php echo (date("Y")-60); ?>:<?php echo (date("Y")-0); ?>" );
$( "#history-to" ).datepicker( "option", "yearRange", "<?php echo (date("Y")-60); ?>:<?php echo (date("Y")-0); ?>" );

</script>


<?php
require_once "inc/footer.php";
?>