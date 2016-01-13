<?php
include("SessionData.php");
session_start();

$UniName = $_POST['UniName']; 
$UniLocation = $_POST['UniLocation']; 
$UniDesc = $_POST['UniDesc']; 
$NumStudents = $_POST['NumStudents'];
$Username = $_SESSION['name'];

$Query = "INSERT INTO University_Profile (NAME, LOCATION, DESCRIPTION, NUM_STUDENTS, CREATED_BY) VALUES "
			."('$UniName', '$UniLocation', '$UniDesc', '$NumStudents', '$Username')";
$result=sqlsrv_query($db,$Query);
echo $result; 

?>