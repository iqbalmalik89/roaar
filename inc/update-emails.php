<?php
$needadmin = true;
require_once "functions.php";

$sql = "UPDATE `email` SET subject='" . $mysqli->real_escape_string($_POST['subject']) . "', message='" . $mysqli->real_escape_string($_POST['message']) . "' WHERE emailID='" . $_POST['id'] . "';";
if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
?>done