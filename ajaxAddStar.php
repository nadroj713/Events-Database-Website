<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name']; 
$eventName = $_POST['eventname'];
$stars = $_POST['stars'];

$Query = "INSERT INTO Stars_On_Event (POSTER_ID, STARS, EVENT_NAME) VALUES ( '$username', '$stars', '$eventName')";
$Result = sqlsrv_query($db, $Query);
echo $Result;

?>