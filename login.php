<?php
$pagetitle = "Login";
$needloggedout = true;
require_once "inc/functions.php";
require_once "inc/header.php";
?>


<div id='bg-img' style='background-image:url("img/register-bg.jpg");'></div>

<div id='register-container'>
	<div class='float-right'>
		<div id='logo'></div>
	</div>
	
	<h1>LOGIN</h1>
	
	<form class='login-form' method='post' class='clearfix' action='inc/login-processor.php'>
		<input type='text' placeholder='email address' name='email' id='email'><br><br>
		<input type='password' placeholder='password' name='password' id='password'><br><br>
		<input type='submit' class='btn' value='Login'>
	</form>
</div>

<script src="js/jquery-ui.min.js"></script>
<script>
$( '.login-form' ).submit( function(e) {
	if ($('#email').val() == "")
	{
		alert("Please enter your email");
		e.preventDefault();
		return false;
	}
	if ($('#password').val() == "")
	{
		alert("Please enter your password");
		e.preventDefault();
		return false;
	}
	if (!validateEmail($('#email').val()) && $('#email').val() != "admin")
	{
		alert("Please enter a valid email address");
		e.preventDefault();
		return false;
	}
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
</script>


<?php
require_once "inc/footer.php";
?>