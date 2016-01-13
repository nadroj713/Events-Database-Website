<?php
include("SessionData.php");
session_start();

if( !empty($_SESSION['name'] ) )
echo: true;

else
echo: false;


?>