<?php
	//this file retrieves all doctor names
	
	//connect to database
	include "connect.php";
	
	//build query
	$query = "SELECT * FROM doctor;";
	
	//connect to database, send in query
	$result = mysqli_query($connection, $query);
	
	//if query fails
	if(!$result) {
		die("Database connection failed.");
	}
	
	//display all doctor names
	while($row = mysqli_fetch_assoc($result)) {
		echo "<option value = '" .$row["licensenum"] . "'>" .$row["licensenum"] . " - " .$row["firstname"]. " " .$row["lastname"] ."</option>";
	}
	
	mysqli_free_result($result);
	mysqli_close($connection);
?>
