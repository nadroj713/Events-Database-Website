<?php
include("SessionData.php");
session_start();
$username=$_POST['username']; 
$password=$_POST['password']; 
$email=$_POST['email'];


$Query = "INSERT INTO Student (PASSWORD, USER_ID, EMAIL) VALUES ('$password', '$username', '$email')";
$result=sqlsrv_query($db,$Query);
echo $result; 


?>