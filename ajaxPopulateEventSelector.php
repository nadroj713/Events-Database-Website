<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name']; 

$Result_Array = array();

$Query = "SELECT EVENT_NAME FROM Event";
$Result = sqlsrv_query($db, $Query);
while($row = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC))
{
	$RSO_Array[] = $row;
}

$html = "";
foreach( $RSO_Array as $row)
{
	foreach($row as $key => $eventName)
	{
		$html .= "<option>" .$eventName. "</option>";
	}
}

echo $html;

?>