<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL & ~E_NOTICE);


$needloggedin = true;
require_once "functions.php";

$target_dir = "../docs/";
$filename = time() . "-" . basename($_FILES["doc-from-pc"]["name"]);
$target_file = $target_dir . $filename;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
/*
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["doc-from-pc"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
*/
// Check if file already exists

/*
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
*/

// Check file size
if ($_FILES["doc-from-pc"]["size"] > 32000000) {
    echo "Sorry, your file is too large. Max 32MB.";
    $uploadOk = 0;
}
// Allow certain file formats
/*
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf" && $imageFileType != "xls" && $imageFileType != "xlsx"  ) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, DOC, DOCX, PDF, XLS, XLSX files are allowed.";
    $uploadOk = 0;
}
*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["doc-from-pc"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["doc-from-pc"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if ($filename!="") {
	$sql = "INSERT INTO `docs` (`userID`,`filename`,`type`) VALUES ('" . $_SESSION['roaarloggedin'] . "','" . $mysqli->real_escape_string($filename) . "','" . $mysqli->real_escape_string($_POST['type']) . "');";
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }

}

header( "Location: ../edit-profile.php");
exit;
?>