<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name']; 
$eventName = $_POST['eventname'];

$Stars_Query = "SELECT * FROM Stars_On_Event WHERE EVENT_NAME = '" .$eventName. "'";
$Stars_Result = sqlsrv_query($db, $Stars_Query);
$Stars_Array = array();

while($row = sqlsrv_fetch_array($Stars_Result, SQLSRV_FETCH_ASSOC))
{
	$Stars_Array[] = $row;
}

$html = "<tr>";
foreach($Stars_Array[0] as $key => $value)
{
	$html .= "<th>" .$key. "</th>";
}
$html .= "</tr>";

foreach($Stars_Array as $row)
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