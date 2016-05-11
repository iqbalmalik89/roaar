<?php
class Pilot { 
	public $details;
	public $licences;
	public $experience;
	public $instructorexperience;
	public $history;
	
    function __construct ($pilotid,$mysqli) { 
		$sql = "SELECT * FROM user WHERE userID='" . $pilotid . "';";
		if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		$row = $result->fetch_array();
		
		$temp = array();
		foreach ($row as $key => $val) {
			if (!(is_numeric($key))) {
				if ($key == "profile-pic" && $val == "") {
					$val = "default.png";
				}
				$temp[$key] = $val;
			}
		}
		$this->details = $temp;

		$this->licences = self::getFK($mysqli,'licence');
		$this->experience = self::getFK($mysqli,'experience');
		$this->instructorexperience = self::getFK($mysqli,'instructor-experience');
		$this->history = self::getFK($mysqli,'history');
		$this->doc = self::getFK($mysqli,'docs','type','doc');
		$this->vid = self::getFK($mysqli,'docs','type','vid');
		$this->ytvid = self::getFK($mysqli,'docs','type','ytvid');
		$this->ref = self::getFK($mysqli,'refs');
    }
    
    function getFK($mysqli,$FKtablename,$filtercolumn='',$filtervalue='') { 
		$temp = array();
		$sql = "SELECT * FROM `" . $FKtablename . "` WHERE userID='" . $this->details['userID'] . "'";
		
		if ($filtercolumn!="" && $filtervalue!="")
			$sql .= " AND `" . $filtercolumn . "`='" . $filtervalue . "'";
		
		$sql .= ";";
		if (!$result = $mysqli->query($sql)) { echo "Error with SQL query - <b>" . $sql . "</b><br>Error: " . $mysqli->sqlstate . " - " . $mysqli->error; exit; }
		while ($row = $result->fetch_array())
		{
			$temp2 = array();
			foreach ($row as $key => $val) {
				if (!(is_numeric($key))) {
					$temp2[$key] = $val;
				}
			}
			array_push($temp,$temp2);
		}
		return $temp;
    }
	
	function displaydocs($name,$type='doc',$editable = true)
	{
		?><div id='<?php echo $type; ?>s'>
			<h3><?php echo $name; ?></h3>
			<?php $count = 0;
			foreach ( $this->{$type} as $doc ) {
				echo "<div class='" . $type . "'><input type='hidden' name='" . $type . "s[]' value='" . $doc['filename'] . "'>";
				if ($editable) echo "<span class='remove'><a href='?remove-doc=" . $doc['docID'] . "'><i class='fa fa-minus-circle'></i></a></span>";
				$temp = explode("-",$doc['filename']);
				unset($temp[0]);
				$filenamewithouttimestamp = implode("-",$temp);
				echo "<a href='docs/" . $doc['filename'] . "'>" . $filenamewithouttimestamp . "</a>";
				echo "</div>";
				$count++;
			}
			if ($count == 0) { echo "none yet..."; }
			?>
		</div><?php
	}
	
	function displayvids($editable = true)
	{
		?><div id='vids'>
			<h3>Videos</h3>
			<?php $count = 0;
			foreach ( $this->vid as $doc ) {
				echo "<div class='vid'><input type='hidden' name='vids[]' value='" . $doc['filename'] . "'>";
				if ($editable) echo "<span class='remove'><a href='?remove-doc=" . $doc['docID'] . "'><i class='fa fa-minus-circle'></i></a></span>";
				//HTML 5 VIDEO PLAYER
				?><video width="320" height="240" controls>
					<source src="docs/<?php echo $doc['filename']; ?>" type="video/<?php echo pathinfo($doc['filename'], PATHINFO_EXTENSION); ?>">
					Your browser does not support this video.
				</video><?php
				echo "</div>";
				$count++;
			}
			foreach ( $this->ytvid as $doc ) {
				echo "<div class='ytvid'><input type='hidden' name='ytvids[]' value='" . $doc['filename'] . "'>";
				if ($editable) echo "<span class='remove'><a href='?remove-doc=" . $doc['docID'] . "'><i class='fa fa-minus-circle'></i></a></span>";
				echo '<iframe width="320" height="240" src="https://www.youtube.com/embed/' . $doc['filename'] . '" frameborder="0" allowfullscreen></iframe>';
				echo "</div>";
				$count++;
			}
			if ($count == 0) { echo "none yet..."; }
			?>
		</div><?php
	}
	
	function displayrefs($editable = true)
	{
		?><div id='refs'>
			<h3>References</h3>
			<?php $count = 0;
			foreach ( $this->ref as $ref ) {
				echo "<div class='ref'><input type='hidden' name='refs[]' value='" . $ref['refID'] . "'>";
				if ($editable) echo "<span class='remove'><a href='?remove-ref=" . $ref['refID'] . "'><i class='fa fa-minus-circle'></i></a></span>";
				echo $ref['companyname'] . " <i>" . $ref['staffname'] . "</i>";
				echo "</div>";
				$count++;
			}
			if ($count == 0) { echo "none yet..."; }
			?>
		</div><?php
	}
}
?>