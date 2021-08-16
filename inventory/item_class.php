<?php class ITEM { private $mIndex; private $mBarcode; private $mDescription; private $mModel_PartNum; 
private $mVendor; private $mSerialNum; private $mShort_Name; private $mProject; private $mCurrentLoc; 
private $mMovedTo; private $mMovedBy; private $mMovedDate; function __construct() {
}
	function SetItem($index, $barcode, $description, $model_Partnum, $vendor, $serialNum, 
$short_Name, $project, $currentLoc, $movedTo, $movedBy , $movedDate)
	{
	$this->mIndex = $index;
	$this->mBarcode = $barcode;
	$this->mDescription = $description;
	$this->mModel_Partnum = $model_PartNum;
	$this->mVendor = $vendor;
	$this->mSerialNum = $serialNum;
	$this->mShort_Name = $short_Name;
	$this->mProject = $project;
	$this->mCurrentLoc = $currentLoc;
	$this->mMovedTo = $movedTo;
	$this->mMovedBy = $movedBy;
	$this->mMovedDate = $movedDate;
	}
	function GetItem($index)
	{
	$sql = "SELECT * FROM Inventory WHERE Index = '$index'";
	$result = mysql_query($sql) or die(mysql_error());
	while($item = mysql_fetch_array($result))
	{
	$this->mIndex = $item[Index];
	$this->mBarcode = $item[Barcode];
	$this->mDescription = $item[Description];
	$this->mModel_PartNum = $item[Model_PartNum];
	$this->mVendor = $item[Vendor];
	$this->mSerialNum = $item[SerialNum];
	$this->mShort_Name = $item[Short_Name];
	$this->mProject = $item[Project];
	$this->mCurrentLoc = $item[CurrentLoc];
	$this->mMovedTo = $item[MovedTo];
	$this->mMovedBy = $item[MovedBy];
	$this->mMovedDate = $item[MoveDate];
	}
	}
function __toString() { echo '<td>' . $this->mIndex . '</td>'; echo '<td>' . $this->mBarcode . 
'</td>'; echo '<td>' . $this->mDescription . '</td>'; echo '<td>' . $this->mModel_PartNum . '</td>'; 
echo '<td>' . $this->mVendor . '</td>'; echo '<td>' . $this->mSerialNum . '</td>'; echo '<td>' . 
$this->mShort_Name . '<td>'; echo '<td>' . $this->mProject . '</td>'; echo '<td>' . $this->mCurrentLoc 
. '</td>'; echo '<td>' . $this->mMovedTo . '</td>'; echo '<td>' . $this->mMovedBy . '</td>'; echo 
'<td>' . $this->mMovedDate . '</td>';
}
}
?>
