<?php
include("SessionData.php");
session_start();
$username=$_SESSION['name']; 
$eventName = $_POST['eventname'];
$comment = $_POST['comment'];

$Query = "INSERT INTO Comment_on_Event (POSTER_ID, COMMENT, EVENT_NAME) VALUES ( '$username', '$comment', '$eventName')";
$Result = sqlsrv_query($db, $Query);
echo $Result;
?>