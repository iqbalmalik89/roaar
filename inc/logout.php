<?php

require_once "functions.php";

$_SESSION['roaarloggedin'] = "";
unset($_SESSION['roaarloggedin']);
session_destroy();

header( "Location: " . $thissite . "/");
exit;
?>