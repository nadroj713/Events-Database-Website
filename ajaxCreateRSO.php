<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name'];
$RSO_Name=$_POST['rso_name'];


$Query = "INSERT INTO RSO_Creation (RSO_NAME, STUDENT_NAME) VALUES ( '" .$RSO_Name. "', '" .$username. "')";
$Result = sqlsrv_query($db,$Query);
echo $Result;
?>