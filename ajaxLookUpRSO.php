<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name']; 

$RSO_Array = array();
$RSO_Query = "SELECT RSO_NAME FROM RSO_Membership WHERE STUDENT_ID = '".$username."' ";
$RSO_Result = sqlsrv_query($db,$RSO_Query);

while($row = sqlsrv_fetch_array($RSO_Result, SQLSRV_FETCH_ASSOC))
{
	$RSO_Array = array_merge($RSO_Array, $row);
}



$html = '';
//List elements
foreach($RSO_Array as $key=>$value){
	$html .= '<li>' . $value . '</li>';
}

echo $html;



?>