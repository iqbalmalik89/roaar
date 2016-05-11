<?php
$needloggedin = true;
require_once "functions.php";

if (isset($_POST['youtube-url']))
{
	$url = $_POST['youtube-url'];
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	$ytcode = $my_array_of_vars['v'];    
	// ****************** INSERT INTO `docs` ******************
	$sql = "INSERT INTO `docs` (`userID`,`filename`,`type`) VALUES ('" . $_SESSION['roaarloggedin'] . "','" . $mysqli->real_escape_string($ytcode) . "','ytvid');";
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