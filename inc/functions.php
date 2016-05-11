<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

if(!isset($_SESSION)){session_start();}

$thissite = "http://roaar.net/dev";

$adminemail = "cooperk937@hotmail.co.uk";

function dbconnect() {
//	$mysqli = new mysqli("localhost", "roaar", "jd3hs93kf03j", "roaar");
	$mysqli = new mysqli("localhost", "root", "", "roaar");
	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	return $mysqli;
}
$mysqli = dbconnect();

include_once "classes/pilot.php";

function loggedin()
{
	if (isset($_SESSION['roaarloggedin']))
		return true;
	else
		return false;
}

function isadmin($mysqli)
{
	
	$sql = "SELECT * FROM `user` WHERE userID='" . $_SESSION['roaarloggedin'] . "' AND admin=1;";
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	
	if ($result->num_rows == 0) {
		return false;
	} else {
		return true;
	}
}

if ((!(isadmin($mysqli))) && $needadmin)
{
	header("Location: " . $thissite . "/?error=auth-needed");
	exit;
}

if ((!(loggedin())) && $needloggedin)
{
	header("Location: " . $thissite . "/?error=auth-needed");
	exit;
}

if (loggedin() && $needloggedout)
{
	if (isadmin($mysqli))
		header("Location: " . $thissite . "/admin.php");
	else
		header("Location: " . $thissite . "/edit-profile.php");
	exit;
}

$thisuser;
if (loggedin())
{
	$thisuser = new Pilot($_SESSION['roaarloggedin'],$mysqli);
}

$getuser;
if (isset($_GET['user']))
{
	$getuser = new Pilot($_GET['user'],$mysqli);
}

if (isset($_GET['deleteme']))
{
	$sql = "DELETE FROM `user` WHERE userID='" . $_SESSION['roaarloggedin'] . "';";
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	$_SESSION['roaarloggedin'] = "";
	unset($_SESSION['roaarloggedin']);
	session_destroy();

	header( "Location: " . $thissite . "/");
	exit;
	
}

if (isset($_GET['remove-doc']))
{
	$sql = "DELETE FROM `docs` WHERE docID='" . $mysqli->real_escape_string($_GET['remove-doc']) . "' AND userID='" . $_SESSION['roaarloggedin'] . "';";
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	
	$url = curPageURL();
	$url = explode('remove-doc',$url);
	$url = $url[0];
	header ("Location: " . $url);
	exit;
}


// ******************************************************
//               USEFUL RANDOM FUNCTIONS
// ******************************************************
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function curPageURLWithoutVars() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 $pagesplit = explode("?",$pageURL);
 return $pagesplit[0];
}
?>