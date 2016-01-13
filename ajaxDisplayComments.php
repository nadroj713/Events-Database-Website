<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name']; 
$eventName = $_POST['eventname'];

$Comments_Query = "SELECT * FROM Comment_on_Event WHERE EVENT_NAME = '" .$eventName. "'";
$Comments_Result = sqlsrv_query($db, $Comments_Query);
$Comments_Array = array();
while($row = sqlsrv_fetch_array($Comments_Result, SQLSRV_FETCH_ASSOC))
{
	$Comments_Array[] = $row;
}

$html = "<tr>";
foreach($Comments_Array[0] as $key => $value)
{
	$html .= "<th>" .$key. "</th>";
}
$html .= "</tr>";

foreach($Comments_Array as $row)
{
	$html .= "<tr>";
	foreach($row as $key => $value)
	{
		$html .= "<td>" .$value. "</td>";
	}
	$html .= "</tr>";
}

echo $html;
?>