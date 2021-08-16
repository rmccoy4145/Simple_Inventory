<?php
class INVENTORY
{
public $table_name;
public $fields = array();
function __construct($table_name)
{
$this->table_name = $table_name;
}
function SortDropForm()
{
echo "<form id=\"sortform\" action=\"\">";
echo "<select name=\"sortby\" onchange=\"onSelectChange();\">";
echo "<option value=\"\"></option>";
echo "<option value=\"All\">All</option>";
echo "<option value=\"RoomA\">RoomA</option>";
echo "<option value=\"RoomB\">RoomB</option>";
echo "<option value=\"RoomC\">RoomC</option>";
echo "<option value=\"RoomD\">RoomD</option>";
echo "<option value=\"RoomE\">RoomE</option>";
echo "<option value=\"RoomF\">RoomF</option>";
echo "<option value=\"RoomG\">RoomG</option>";
echo "<option value=\"Cisco\">Cisco</option>";
echo "<option value=\"Juniper\">Juniper</option>";
echo "<option value=\"Vendor\">Vendor</option>";
echo "<option value=\"Project\">Project</option>";
echo "<option value=\"MovedTo\">MovedTo</option>";
echo "<option value=\"MovedBy\">MovedBy</option>";
echo "</select>";
echo "</form>";
}
public function Controls()
{
echo "<table>";
echo "<tr><td style=\"color:yellow\">Sort By:</td><td style=\"color:yellow\">Update Table</td></tr>"; 
echo "<tr><td>";
$this->SortDropForm(); 
echo "</td><td>";
$this->UpdateButton();
echo "</td></table>"; 
}
	
public function SortInventory()
{
$sort = $_GET['sortby'];
if (!ISSET($sort))
{
$sort = 'All';
}
switch ($sort)
{
case "RoomA";
$sql = 'SELECT * FROM Inventory WHERE CurrentLoc LIKE \'%RoomA%\' ORDER BY CurrentLoc ASC';
break;
case "RoomB";
$sql = 'SELECT * FROM Inventory WHERE CurrentLoc LIKE \'%RoomB%\' ORDER BY CurrentLoc ASC';
break;
case "RoomC";
$sql = 'SELECT * FROM Inventory WHERE CurrentLoc LIKE \'%RoomC%\' ORDER BY CurrentLoc ASC';
break;
case  "RoomD";
$sql = 'SELECT * FROM Inventory WHERE CurrentLoc LIKE \'%RoomD%\' and CurrentLoc Like \'%Back%\' order by CurrentLoc';
break;
case "RoomE";
$sql = 'SELECT * FROM Inventory WHERE CurrentLoc LIKE \'%RoomE%\' ORDER BY CurrentLoc ASC';
break;
case "RoomF";
$sql = 'SELECT * FROM Inventory WHERE CurrentLoc LIKE \'%RoomF%\' ORDER BY CurrentLoc ASC';
break;
case "RoomG";
$sql = 'SELECT * FROM Inventory WHERE CurrentLoc LIKE \'%RoomG%\' ORDER BY CurrentLoc ASC';
break;
case "Cisco";
$sql = 'SELECT * FROM Inventory WHERE Vendor LIKE \'%Cisco%\' ORDER BY CurrentLoc ASC';
break;
case "Juniper";
$sql = 'SELECT * FROM Inventory WHERE Vendor LIKE \'%Juniper%\' ORDER BY CurrentLoc ASC';
break;
case "Vendor";
$sql = 'SELECT * FROM Inventory ORDER BY Vendor ASC';
break;
case 'Project';
$sql = 'SELECT * FROM Inventory ORDER BY Project ASC';
break;
case "MovedTo";
$sql = 'SELECT * FROM Inventory ORDER BY MovedTo ASC';
break;
case "MovedBy";
$sql = 'SELECT * FROM Inventory ORDER BY MovedBy ASC';
case "All";
$sql = "SELECT * FROM `$this->table_name`";
break;
}
return mysql_query($sql);
}

public function JQuery($id)
{
echo "<script>";
echo "

$(document).ready(function(){
$('#updateMe$id').hide();
$('#edit$id').click(function() 
{
if ($('#edit$id').prop('checked') == true)
{
   $('.bar$id').removeAttr(\"readonly\");
   $('.des$id').removeAttr(\"readonly\");
   $('.par$id').removeAttr(\"readonly\");
   $('.ven$id').removeAttr(\"readonly\");
   $('.ser$id').removeAttr(\"readonly\");
   $('.sho$id').removeAttr(\"readonly\");
   $('.pro$id').removeAttr(\"readonly\");
   $('.loc$id').removeAttr(\"readonly\");
   $('.mot$id').removeAttr(\"readonly\");
   $('.mob$id').removeAttr(\"readonly\");
   $('.mod$id').removeAttr(\"readonly\");
   $('.rowform$id').css(\"background-color\",\"yellow\");
   $('#updateMe$id').prop('checked', true);
   }
   if ($('#edit$id').prop('checked') == false)
	{
   $('.bar$id').attr(\"readonly\", true);
   $('.des$id').attr(\"readonly\", true);
   $('.par$id').attr(\"readonly\", true);
   $('.ven$id').attr(\"readonly\", true);
   $('.ser$id').attr(\"readonly\", true);
   $('.sho$id').attr(\"readonly\", true);
   $('.pro$id').attr(\"readonly\", true);
   $('.loc$id').attr(\"readonly\", true);
   $('.mot$id').attr(\"readonly\", true);
   $('.mob$id').attr(\"readonly\", true);
   $('.mod$id').attr(\"readonly\", true);
   $('.rowform$id').css(\"background-color\",\"green\");
   }
 });
$('#updateAll').click(function () 
  {
if ($('#updateMe$id').prop('checked') == true)
  {
    $.post(  'update.php', 
	  {
		ind$id			:			$('input[name=ind$id]').val(),
		bar$id 			: 			$('input[name=bar$id]').val(),
		des$id 			: 			$('input[name=des$id]').val(),
		par$id 			: 			$('input[name=par$id]').val(),
		ven$id			:   		$('input[name=ven$id]').val(),
		ser$id 			: 			$('input[name=ser$id]').val(),
		sho$id 			: 			$('input[name=sho$id]').val(),
		pro$id			: 			$('input[name=pro$id]').val(),
		loc$id 			: 			$('input[name=loc$id]').val(),
		mot$id			: 			$('input[name=mot$id]').val(),
		mob$id 		: 			$('input[name=mob$id]').val(),
		mod$id 		: 			$('input[name=mod$id]').val(),
		updateMe$id : 			$('input[name=updateMe$id]').val(),
		rowid			: 			$id
	  },                        
     function(data)          
      {
        $('#sta$id').css(\"background-color\",\"green\").val(data) ;    
      } 
    );
	}
	else
	{
	}
  }); 
   });
  </script>";
}

public function UpdateButton()
{
echo "<input type=\"button\" id=\"updateAll\" name=\"updateAll\" value=\"Update\">";
}

public function DisplayInventory($result)
{
echo "<table class='editableTable' border='5' bgcolor='#FFFFFF' width='100%'>
<tr class=\"legend\">
<td colspan=\"2\">Legend</td>
<td bgcolor='white'>Not Edited</td>
<td bgcolor='yellow'>Editing</td>
<td bgcolor='green'>Edited</td>
</tr>";
echo "<tr>";
echo "<th bgcolor='#C0C0C0'>Edit Line</th>";
echo "<form action=\"\" method=\"get\" id=\"inventoryForm\">";
$id = 0;
$a = 0;
$b = 0;
while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
{
while($a<(count($row)/2))
{
$this->fields[] = mysql_field_name($result, $a);
$a++;
}
while($b<(count($row)/2))
{
  echo "<th bgcolor='#C0C0C0'>";
  echo $this->fields[$b];
  echo "</th>";
  $b++;
  if ($b>=(count($row)/2))
{
echo "<th bgcolor='#C0C0C0'>Edit Status</th>";
echo "</tr>";
}
 }
if ($row == NULL)
{
echo "<tr><td align=\"center\">No Items Found</td></tr>";
}
else
{
  $this->JQuery($id);
	for ($i=0;$i<count($row);$i++)
	{
  ${'items' . $id}[] = $row[$i];
  }
  echo "<tr id=\"rowform$id\" class=\"rowform$id\">";
  echo "<td><input id=\"edit$id\" name=\"edit$id\" type=\"checkbox\"><input id=\"updateMe$id\" class=\"updateMeCss\" name=\"updateMe$id\" type=\"checkbox\" value=\"updateMe\"></td>";
  echo "<td><input readonly style=\"color:black\" name='ind$id' type='text' value=" . ${'items' . $id}[0] ." </td>";
  echo "<td><input readonly class='bar$id' name='bar$id' type='text' value=" . ${'items' . $id}[1] ."></td>";
  echo "<td><input readonly class='des$id' name='des$id' type='text' value=" . ${'items' . $id}[2] ."></td>";
  echo "<td><input readonly class='par$id' name='par$id' type='text' value=" . ${'items' . $id}[3] ."></td>";
  echo "<td><input readonly class='ven$id' name='ven$id' type='text' value=" . ${'items' . $id}[4] ."></td>";
  echo "<td><input readonly class='ser$id' name='ser$id' type='text' value=" . ${'items' . $id}[5] ."></td>";
  echo "<td><input readonly class='sho$id' name='sho$id' type='text' value=" . ${'items' . $id}[6] ."></td>";
  echo "<td><input readonly class='pro$id' name='pro$id' type='text' value=" . ${'items' . $id}[7] ."></td>";
  echo "<td><input readonly class='loc$id' name='loc$id' type='text' value=" . ${'items' . $id}[8] ."></td>";
  echo "<td><input readonly class='mot$id' name='mot$id' type='text' value=" . ${'items' . $id}[9] ."></td>";
  echo "<td><input readonly class='mob$id' name='mob$id' type='text' value=" . ${'items' . $id}[10] ."></td>";
  echo "<td><input readonly class='mod$id' name='mod$id' type='text' value=" . ${'items' . $id}[11] ."></td>";
  echo "<td><input readonly id='sta$id' name='sta$id' type='text' value='&nbsp;'></td>";
  echo "</tr>";
  ++$id;
  }
}
echo "</form></table>";
mysql_free_result($result);
}


}
?>