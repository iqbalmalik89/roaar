<?php
$needloggedin = true;
require_once "functions.php";

if (isset($_POST['ref-company-name']))
{
	// ****************** INSERT INTO `user` ******************
	$sql = "INSERT INTO `refs` (`userID`,`companyname`,`staffname`,`contactnumber`,`email`) VALUES ('" . $_SESSION['roaarloggedin'] . "','" . $mysqli->real_escape_string($_POST['ref-company-name']) . "','" . $mysqli->real_escape_string($_POST['ref-staff-name']) . "','" . $mysqli->real_escape_string($_POST['ref-contact-no']) . "','" . $mysqli->real_escape_string($_POST['ref-email']) . "');";
	if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
}
else
{
	header("Location: " . $thissite . "/?error=nothing-posted");
	exit;
}








header("Location: " . $thissite . "/edit-profile.php");
exit;
?>