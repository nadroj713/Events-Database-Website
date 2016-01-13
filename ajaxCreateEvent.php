<?php
include("SessionData.php");
session_start();
$username = $_SESSION['name'];
$eventName = $_POST['eventname'];
$eventDate = $_POST['eventdate'];
$eventLocation = $_POST['eventlocation'];
$eventCategory = $_POST['eventcategory'];
$eventDesc = $_POST['eventdesc'];
$eventPrivacyLevel = $_POST['eventprivacylevel'];
$eventEmail = $_POST['eventemail'];
$eventPhone = $_POST['eventphone'];
$eventRSO = $_POST['eventrso'];


$Query = "INSERT INTO Event (EVENT_NAME, DESCRIPTION, LOCATION, DATE, EVENT_CATEGORY, EMAIL_ADDRESS, PHONE_NUMBER, PRIVACY_LEVEL,".
		"CREATED_BY, RSO_AFFILIATION)".
		"VALUES ('$eventName', '$eventDesc', '$eventLocation','$eventDate',  '$eventCategory',  '$eventEmail',".
					" '$eventPhone', '$eventPrivacyLevel', '$username', '$eventRSO')";
		
$Result = sqlsrv_query($db, $Query);
echo $Result;




?>