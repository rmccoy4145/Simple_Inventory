<?php include('db_connect.php'); 
include('item_class.php'); 
include('inventory_class.php'); 
$newInventory = new INVENTORY('tableName'); 
//$sort = $_GET['sortby']; $result = 
$result = $newInventory->SortInventory($sort); 
?> 
<html> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
"http://www.w3.org/TR/html4/strict.dtd">
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd"> 
<head> 
<script src="jquery/jquery-1.10.2.min.js"></script>
<script> function onSelectChange() {
 document.getElementById('sortform').submit();
}
$(document).ready(function(){
$('.loading').hide();
});
</script>
<title>Table Editor</title> <!-- define some style elements--> <meta http-equiv="Content-Type" 
content="text/html; charset=iso-8859-1"> <link rel="stylesheet" type="text/css" 
href="css/inv.css" /> 
<style> 
</style> 
<link rel="icon" href="/fav.ico" type="images/"> 
</head> 
<body bgcolor="#000000"> 
<div class="loading">
<p><span>Loading please wait...</span></p>
</div>
<div style="background-color:#000; width:100%; height:100%"> 
<?php 
$newInventory->Controls(); 
echo "<table border='1' vertical-align='center' bgcolor='#FFFFFF' 
width='100%'> <tr> <td align='center' vertical-align='center' width='100%'><font 
size='8'>Table Editor$sortby</font></td> </tr>"; 
echo "</table>"; 
$newInventory->DisplayInventory($result); 
mysql_free_result($result); 
mysql_close($link); 
?> 
</div> 
<a style="position: fixed; bottom:5px;right:5px;" href="#" title="Back to Top">
<img style="border: none;" 
src="/b2t_button.png" width="45" height="50"/>
</a> 
</body>
</html>
