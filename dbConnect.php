<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbName = "Mailroom";

	// Create connection
	$con=new mysqli($servername, $username, $password, $dbName);
	// Check connection
	if ($con->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
?>