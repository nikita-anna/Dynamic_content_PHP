<?php
	$host = 'localhost';
	$dbname = 'php_dynamic_content';
	$username = 'root';
	$password = 'I@mysql25';

	$conn = mysqli_connect($host, $username, $password, $dbname);

	if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
	}
?>
