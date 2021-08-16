<?php
include('db_connect.php'); 
$id = $_POST['rowid'];
$bar = $_POST["bar$id"];
$des = $_POST["des$id"];
$par = $_POST["par$id"];
$ven = $_POST["ven$id"];
$ser = $_POST["ser$id"];
$sho = $_POST["sho$id"];
$pro = $_POST["pro$id"];
$loc = $_POST["loc$id"];
$mot = $_POST["mot$id"];
$mob = $_POST["mob$id"];
$mod = $_POST["mod$id"];
$ind = $_POST["ind$id"];


$sql = "UPDATE `Inventory` SET Barcode = '$bar', Description = '$des', Model_PartNum = '$par', Vendor = '$ven', SerialNum = '$ser', Short_Name = '$sho', Project = '$pro', CurrentLoc= '$loc', MovedTo = '$mot', MovedBy = '$mob', MoveDate = '$mod' WHERE `Index` =$ind";
$updateRow = mysql_query($sql) or die(mysql_error());
echo "Updated";
?>