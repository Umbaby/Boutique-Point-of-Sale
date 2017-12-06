<?php
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "database";

		//create connection
		$conn = new mysqli($server,$username,$password,$dbname);
		
		//evaluate the connection
		if($conn->connect_errno){
			die("Could not connect: " . $conn->connect_error);
		}
?>