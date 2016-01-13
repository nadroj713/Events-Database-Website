<?php
include("SessionData.php");
session_start();
$username = $_SESSION['name'];
$searchParam = $_POST['searchparam'];


$Query = "SELECT * FROM Event WHERE LOCATION = '$searchParam'";


if (array_key_exists( 'eventname', $_POST) )
{
	$eventName = $_POST['eventname'];
	$Query .= " AND EVENT_NAME = '$eventName'";
}

if (array_key_exists( 'eventdate', $_POST))
{
	$eventDate = $_POST['eventdate'];
	$Query .= " AND DATE = '$eventDate'";
}

if (array_key_exists( 'eventcategory', $_POST))
{
	$eventCategory = $_POST['eventcategory'];
	$Query .= " AND EVENT_CATEGORY = '$eventCategory'";
}

if (array_key_exists( 'eventrso', $_POST))
{
	$eventRSO = $_POST['eventrso'];
	$Query .= " AND RSO_AFFILIATION = '$eventRSO'";
	
}


$Result_Array = array();
	



$Result = sqlsrv_query($db, $Query);

if( !sqlsrv_has_rows($Result) )
{
	echo false;
	return;
}
	

while($row = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC) )
{
	$Result_Array[] = $row;
}

$html = '<tr>';
//header row
foreach($Result_Array[0] as  $key => $value)
{
	$html .= '<th>' . $key . '</th>';
}
$html .= '</tr>';

foreach($Result_Array as $row)
{
	$html .= "<tr>";
	foreach($row as $key => $value)
	{
		
		if(strcmp($key, "DATE") == 0)
			{
				$html .= '<td>' . date_format($value, 'Y-m-d') . '</td>';
			}
			
			else
			{
				$html .= '<td>' . $value . '</td>';
			}
		
	}
	$html .= "</tr>";


echo $html;
}


?>