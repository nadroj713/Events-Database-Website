<?php
	$serverName = "KRAKEN\SQLEXPRESS"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"DB_Project");
	$db = sqlsrv_connect( $serverName, $connectionInfo);
?>