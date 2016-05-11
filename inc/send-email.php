<?php
$needadmin = true;
require_once "functions.php";
require_once "PHPMailer/PHPMailerAutoload.php";

$sql = "SELECT * FROM `user` WHERE userID='" . $_POST['userid'] . "'";
if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
$userrow = $result->fetch_array();

$sql = "SELECT * FROM `email` WHERE emailID='" . $_POST['emailid'] . "'";
if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
$emailrow = $result->fetch_array();

$subject = $emailrow['subject'];
$message = $emailrow['message'];
foreach($userrow as $replacefrom => $replaceto )
{
	$subject = str_replace("[" . $replacefrom . "]",$replaceto,$subject);
	$message = str_replace("[" . $replacefrom . "]",$replaceto,$message);
}

$message = nl2br($message);


$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.zoniax.com"; // sets the SMTP server
/*
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
*/
//$mail->SMTPAuth   = true;                  // enable SMTP authentication
//$mail->SMTPSecure = 'tls';
$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
$mail->Username   = "info@roaar.net"; // SMTP account username
$mail->Password   = "RtROtndf.5sT";        // SMTP account password

$mail->SetFrom('info@roaar.net', 'Roaar');

$mail->AddReplyTo('info@roaar.net', 'Roaar');

$mail->Subject    = $subject;

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($message);

$mail->AddAddress($userrow['email'], $userrow['fname'] . " " . $userrow['sname']);

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Email successfully sent to " . $userrow['email'];
}
    



?>