<?php
include("SessionData.php");
session_start();
$username = $_POST['username'];
$password = $_POST['password'];




$Admin_Query = "SELECT USER_ID FROM Admin WHERE USER_ID = '" .$username."' AND PASSWORD = '" .$password. "'";
$Super_Admin_Query = "SELECT USER_ID FROM Super_Admin WHERE USER_ID = '" .$username."' AND PASSWORD = '" .$password. "'";

$Admin_Result=sqlsrv_query($db,$Admin_Query);
$Super_Admin_Result = sqlsrv_query($db,$Super_Admin_Query);


$Admin=sqlsrv_has_rows($Admin_Result);
$Super_Admin=sqlsrv_has_rows($Super_Admin_Result);

if($Super_Admin == true)
{
	$_SESSION['access'] = "super";
}

else if($Admin == true)
{
	$_SESSION['access'] = "admin";
}

else 
{
	$_SESSION['access'] = "student";
}


?>