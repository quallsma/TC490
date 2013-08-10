<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Database Connection</title>
</head>
<body>
	<?php
	session_start();
	
	$hostname = "localhost";
	$username = "quallsma";
	$password = "Detroit09*";
	$database = "quallsma_TC490";
	
	$connect = mysql_connect($hostname,$username,$password)or die("could not connect to server");
	$db1 = mysql_select_db($database)or die("could not select the database");
	?>
</body>
</html>