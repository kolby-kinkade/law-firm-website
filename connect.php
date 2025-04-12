<?php
	// Ensure BASEPATH is defined or prevent direct script access
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	// Database information
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "reeve_basnett_law_database";
	$dsn = "";
	
	try {		
		$dsn = 'mysql:host='.$servername. ';dbname='.$dbname;
		
		$pdo = new PDO($dsn, $username, $password);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
	} catch(PDOException $e) {
		echo "Connection failed: " . $e -> getMessage();
	}
?>