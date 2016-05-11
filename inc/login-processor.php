<?php
require_once "functions.php";

$sql = "SELECT * FROM `user` WHERE email='" . $mysqli->real_escape_string($_POST['email']) . "' AND password='" . sha1($mysqli->real_escape_string($_POST['password'])) . "';";
if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }

if ($result->num_rows == 0) {
	header( "Location: " . $thissite . "/login.php?error=invalid-login");
	exit;
}

$row = $result->fetch_array();
$_SESSION['roaarloggedin'] = $row['userID'];


if ($row['admin'] == 1) {
	header( "Location: ../admin.php");
} else {
	header( "Location: ../edit-profile.php");
}

exit;
?>