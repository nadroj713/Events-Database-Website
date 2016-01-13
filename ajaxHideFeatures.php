<?php
include("SessionData.php");
session_start();

$access = $_SESSION['access'];
echo $access;
/*
if(strcmp($access, "super") == 0 )
{
	echo "super";
	return;
}

else if($access, "admin")
{
	echo "admin";
	return;
}

echo "student"
return;
*/
?>