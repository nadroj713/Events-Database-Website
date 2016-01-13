<?php
include("SessionData.php");
session_start();
$username=$_POST['username']; 
$password=$_POST['password']; 


$Query = "SELECT USER_ID FROM Student WHERE USER_ID = '" .$username. "' AND PASSWORD = '" .$password. "'";

$result=sqlsrv_query($db,$Query);
$count=sqlsrv_num_rows($result);
$row=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
// If result matched $username and $password, table row  must be 1 row
$_SESSION['name'] = $row['USER_ID'];
echo $row['USER_ID']



?>