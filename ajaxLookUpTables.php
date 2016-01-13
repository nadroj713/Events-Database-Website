<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name']; 

$Events_Array = array();
$RSO_Array = array();
$RSO_Query = "SELECT RSO_NAME FROM RSO_Membership WHERE STUDENT_ID = '$username' ";
$RSO_Result = sqlsrv_query($db,$RSO_Query);
while($row = sqlsrv_fetch_array($RSO_Result, SQLSRV_FETCH_ASSOC))
{
	$RSO_Array[] = $row;
}

$Event_Privacy_Query = "SELECT * FROM Event WHERE PRIVACY_LEVEL = 'public' ORDER BY DATE";


$Event_Privacy_Result = sqlsrv_query($db,$Event_Privacy_Query);
while($row = sqlsrv_fetch_array($Event_Privacy_Result, SQLSRV_FETCH_ASSOC))
{

	$Events_Array[] = $row;

}




$Event_RSO_Query = "SELECT * FROM Event WHERE RSO_AFFILIATION = ";
foreach($RSO_Array as $row)
{
	
	$Query = "" . $Event_RSO_Query . "'" .$row['RSO_NAME']. "'";
	$Result = sqlsrv_query($db, $Query);
	
	while($row = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC))
	{

		$Events_Array[] = $row;

	}
}

$Events_Array = array_unique($Events_Array, SORT_REGULAR);

//Begin Table

$html = '<tr>';
//header row
$Events_Array_Row = $Events_Array[0];

foreach($Events_Array_Row as  $key => $value){
	$html .= '<th>' . $key . '</th>';
}
$html .= '</tr>';

//data rows

foreach($Events_Array as $row)
{
	$html .= '<tr>';
	foreach( $row as $key=>$value){
			if(strcmp($key, "DATE") == 0)
			{
				$html .= '<td>' . date_format($value, 'Y-m-d') . '</td>';
			}
			
			else
			{
				$html .= '<td>' . $value . '</td>';
			}
			
			
		}
	$html .= '</tr>';
	
}
//End Table



echo $html;



?>