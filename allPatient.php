<?php
	//this file is for displaying all patient name

	//connect to database
	include "connect.php";
	$query = "SELECT * FROM patient;";
	
	//connect to database, send query
	$result = mysqli_query($connection, $query);
	
	//if query fails
	if(!$result) {
		die("Database query failed.");
	}
	
	//loop through patients, print name
	while($row = mysqli_fetch_assoc($result)) {
		echo "<option value = '" .$row["ohipnum"] . "'>" .$row["ohipnum"] . " - " .$row["firstname"] . " " . $row["lastname"] . "</option>";
	}

	mysqli_free_result($result);
	
	//close database
	mysqli_close($connection);
?>
