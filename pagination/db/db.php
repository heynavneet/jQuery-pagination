<?php
//  Database Configuration
define("DB_HOST", "localhost");  // Database Host
define("DB_USER", "root");  // Database Username
define("DB_PASS", "");  // Database Password
define("DB_NAME", "pagination"); // Database Name

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//Check Connection
if (mysqli_connect_errno() ){
		echo "Database Connection Failed: " . mysqli_connect_error();
		die;
	}
?>
