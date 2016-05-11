<?php
$needadmin = true;
require_once "functions.php";

$srchterms = explode(" ",$_GET['srch']);

$sql = "SELECT * FROM `user` WHERE pilot=1 AND ";
foreach ($srchterms as $t)
{
	if ($t != "") $sql .= " (fname like '%" . $t . "%' OR sname like '%" . $t . "%' OR userID like '%" . $t . "%') AND ";
} 
$sql = substr($sql, 0, -4);
$sql .= " ORDER BY userID ASC;";
if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }

$counter = 1;
while ($row = $result->fetch_array())
{
	?>
	<div class="pilot-row">
		<div class="pilot-number">
			<?php echo $row['userID']; ?>.
		</div>
		<div class="pilot-name">
			<?php echo $row['fname'] . " " . $row['sname']; ?>
		</div>
		<div class="pilot-button">
			<a class="btn" href="admin-view-profile.php?user=<?php echo $row['userID']; ?>">View<br>Profile</a>
		</div>
		<div class="pilot-button">
			<a class="btn">Airline<br>Interested</a>
		</div>
		<div class="pilot-button">
			<a class="btn">Interview<br>Requested</a>
		</div>
		
	</div>
	<?php
	$counter++;
}