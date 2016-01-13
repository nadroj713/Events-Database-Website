<!DOCTYPE html>
<html lang="en">

<head>
    <title>HTML CODE FOR WEBSITE TEMPLATE</title>
</head>

<body>
    <?php echo "Connecting to server"; 
	$serverName = "KRAKEN\SQLEXPRESS"; //serverName\instanceName
	$connectionInfo = array( "Database"=>"DB_Project");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$Q1 = "SELECT * FROM Student";
$R1 = sqlsrv_query($conn, $Q1);

while( $row = sqlsrv_fetch_array( $R1, SQLSRV_FETCH_ASSOC) ) {
      echo $row['USER_ID'].", ".$row['PASSWORD']."<br />";
}

	?>
</body>

</html>