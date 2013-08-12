<?php
	session_start();
	
	$hostname = "localhost";
	$username = "quallsma";
	$password = "Detroit09*";
	$database = "quallsma_TC490";
	
	$connect = mysql_connect($hostname,$username,$password)or die("could not connect to server");
	$db1 = mysql_select_db($database)or die("could not select the database");
?>
