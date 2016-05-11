<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $pagetitle; ?> | ROAAR</title>

<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>

<?php
$pagename = $_SERVER['PHP_SELF'];
$pagename = explode("/",$pagename);
$pagename = $pagename[(count($pagename)-1)];
$pagename = str_replace(".php","",$pagename);
?>

<body class='<?php echo $pagename; ?>'>
<div id='lightbox'></div>
<div id='backdrop'></div>