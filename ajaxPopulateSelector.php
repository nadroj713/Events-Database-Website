<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name']; 

$RSO_Array = array();
$Query = "SELECT * FROM RSO_Membership WHERE STUDENT_ID = '$username'";
$Result = sqlsrv_query($db,$Query);
while($row = sqlsrv_fetch_array($Result, SQLSRV_FETCH_ASSOC))
{
	//print_r($row);
	$RSO_Array[] = $row;

}

$html = "";
foreach($RSO_Array as $row)
{
	$html .= "<option value = '" .$row['RSO_NAME']. "'>" .$row['RSO_NAME']. "</option>";
}

echo $html;
?>