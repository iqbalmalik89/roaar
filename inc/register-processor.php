<h1>Register Processor</h1>
<?php
require_once "functions.php";

if (isset($_POST['fname']))
{
	$userid;
	
	
	// ****************** GET COLUMNS FROM `user` ******************
	$sql = 'SHOW COLUMNS FROM `user`';
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	$cols = array();
	while ($row = $result->fetch_array()) {
		array_push($cols,$row['Field']);
	}
	


	
	if (isset($_POST['edit'])) {
		// ****************** UPDATE `user` ******************
		$sql = "UPDATE `user` SET ";
		foreach( $_POST as $key => $val ) {
			if (in_array($key,$cols)) {
				if ($key == "password") {
					$sql .= "`" . $key . "`='" . sha1($val) . "',";
				} else {
					$sql .= "`" . $key . "`='" . $mysqli->real_escape_string($val) . "',";
				}
			}
		}
		$sql = substr($sql,0,-1);
		$sql .= " WHERE userID='" . $_SESSION['roaarloggedin'] . "';";
		if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		
		// ****************** GET THE USER ID ******************
		$userid = $_SESSION['roaarloggedin'];
	
	// OR
	} else {
		// ****************** INSERT INTO `user` ******************
		$sql = "INSERT INTO `user` (";
		foreach( $_POST as $key => $val ) {
			if (in_array($key,$cols)) {
				$sql .= "`" . $key . "`,";
			}
		}
		$sql = substr($sql,0,-1);
		$sql .= ") VALUES (";
		foreach( $_POST as $key => $val ) {
			if (in_array($key,$cols)) {
				if ($key == "password") {
					$sql .= "'" . sha1($val) . "',";
				} else {
					$sql .= "'" . $mysqli->real_escape_string($val) . "',";
				}
			}
		}
		$sql = substr($sql,0,-1);
		$sql .= ");";
		if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		
		// ****************** GET THE USER ID ******************
		$userid = $mysqli->insert_id;
	}
	
	

	// ****************** GET COLUMNS FROM `licence` ******************
	$sql = 'SHOW COLUMNS FROM `licence`';
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	$cols = array();
	while ($row = $result->fetch_array()) {
		array_push($cols,$row['Field']);
	}
	
	
	// ****************** DELETE FROM `licence` ******************
	$sql = "DELETE FROM `licence` WHERE `userID`='" . $userid . "' AND ";
	foreach ($_POST['licenceID'] as $licid) {
		$sql .= "`licenceID`<>'" . $licid . "' AND ";
	}
	$sql = substr($sql,0,-4);
	$sql .= ";";
	if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }

	
	// ****************** UPDATE `licence` ******************
	// STILL NEED TO DO THIS iterate through each licence with a licenceno and update all vals
	for ($i = 0; $i < count($_POST['licenceID']); ++$i) {
		$sql = "UPDATE `licence` SET ";
		foreach( $_POST as $key => $val ) {
			if (in_array($key,$cols)) {
				$sql .= "`" . $key . "`='" . $mysqli->real_escape_string($val[$i]) . "',";
			}
		}
		$sql = substr($sql,0,-1);
		$sql .= " WHERE licenceID='" . $_POST['licenceID'][$i] . "';";
		echo $sql;
		if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	}

	// ****************** INSERT INTO `licence` ******************
	for ($i = 0; $i < count($_POST['licence-no']); ++$i) {
		if (!(isset($_POST['licenceID'][$i]))) {
			$sql = "INSERT INTO `licence` (`userID`,";
			foreach( $_POST as $key => $val ) {
				if (in_array($key,$cols)) {
					$sql .= "`" . $key . "`,";
				}
			}
			$sql = substr($sql,0,-1);
			$sql .= ") VALUES ('" . $userid . "',";
			foreach( $_POST as $key => $val ) {
				if (in_array($key,$cols)) {
					$sql .= "'" . $mysqli->real_escape_string($val[$i]) . "',";
				}
			}
			$sql = substr($sql,0,-1);
			$sql .= ");";
			echo $sql;
			if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		}
	}


	// ****************** GET COLUMNS FROM `experience` ******************
	$sql = 'SHOW COLUMNS FROM `experience`';
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	$cols = array();
	while ($row = $result->fetch_array()) {
		array_push($cols,$row['Field']);
	}

	
	// ****************** DELETE FROM `experience` ******************
	$sql = "DELETE FROM `experience` WHERE `userID`='" . $userid . "' AND ";
	foreach ($_POST['experienceID'] as $expid) {
		$sql .= "`experienceID`<>'" . $expid . "' AND ";
	}
	$sql = substr($sql,0,-4);
	$sql .= ";";
	if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	
	// ****************** INSERT INTO `experience` ******************
	for ($i = 0; $i < count($_POST['exp-aircraft-type']); ++$i) {
		if (!(isset($_POST['experienceID'][$i]))) {
			$sql = "INSERT INTO `experience` (`userID`,";
			foreach( $_POST as $key => $val ) {
				if (in_array($key,$cols)) {
					$sql .= "`" . $key . "`,";
				}
			}
			$sql = substr($sql,0,-1);
			$sql .= ") VALUES ('" . $userid . "',";
			foreach( $_POST as $key => $val ) {
				if (in_array($key,$cols)) {
					$sql .= "'" . $mysqli->real_escape_string($val[$i]) . "',";
				}
			}
			$sql = substr($sql,0,-1);
			$sql .= ");";
			if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		}
	}

	// ****************** GET COLUMNS FROM `history` ******************
	$sql = 'SHOW COLUMNS FROM `history`';
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	$cols = array();
	while ($row = $result->fetch_array()) {
		array_push($cols,$row['Field']);
	}

	
	// ****************** DELETE FROM `history` ******************
	$sql = "DELETE FROM `history` WHERE `userID`='" . $userid . "' AND ";
	foreach ($_POST['historyID'] as $expid) {
		$sql .= "`historyID`<>'" . $expid . "' AND ";
	}
	$sql = substr($sql,0,-4);
	$sql .= ";";
	if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	
	// ****************** INSERT INTO `history` ******************
	for ($i = 0; $i < count($_POST['exp-history-airline-company']); ++$i) {
		if (!(isset($_POST['experienceID'][$i]))) {
			$sql = "INSERT INTO `history` (`userID`,";
			foreach( $_POST as $key => $val ) {
				if (in_array($key,$cols)) {
					$sql .= "`" . $key . "`,";
				}
			}
			$sql = substr($sql,0,-1);
			$sql .= ") VALUES ('" . $userid . "',";
			foreach( $_POST as $key => $val ) {
				if (in_array($key,$cols)) {
					$sql .= "'" . $mysqli->real_escape_string($val[$i]) . "',";
				}
			}
			$sql = substr($sql,0,-1);
			$sql .= ");";
			if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		}
	}


	// ****************** GET COLUMNS FROM `instructor-experience` ******************
	$sql = 'SHOW COLUMNS FROM `instructor-experience`';
	if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	$cols = array();
	while ($row = $result->fetch_array()) {
		array_push($cols,$row['Field']);
	}

	
	// ****************** DELETE FROM `instructor-experience` ******************
	$sql = "DELETE FROM `instructor-experience` WHERE `userID`='" . $userid . "' AND ";
	foreach ($_POST['instr-experienceID'] as $expid) {
		$sql .= "`instr-experienceID`<>'" . $expid . "' AND ";
	}
	$sql = substr($sql,0,-4);
	$sql .= ";";
	if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
	
	// ****************** INSERT INTO `instructor-experience` ******************
	for ($i = 0; $i < count($_POST['instr-exp-instructor-aircraft-type']); ++$i) {
		if (!(isset($_POST['instr-experienceID'][$i]))) {
			$sql = "INSERT INTO `instructor-experience` (`userID`,";
			foreach( $_POST as $key => $val ) {
				if (in_array($key,$cols)) {
					$sql .= "`" . $key . "`,";
				}
			}
			$sql = substr($sql,0,-1);
			$sql .= ") VALUES ('" . $userid . "',";
			foreach( $_POST as $key => $val ) {
				if (in_array($key,$cols)) {
					$sql .= "'" . $mysqli->real_escape_string($val[$i]) . "',";
				}
			}
			$sql = substr($sql,0,-1);
			$sql .= ");";
			if (!$mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		}
	}
}
else
{
	header("Location: ../?error=nothing-posted");
	exit;
}








header("Location: ../register-success.php");
exit;
?>