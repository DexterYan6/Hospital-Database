<?php
	//file to update the number of beds in hospital
	
	//connect to database
	include "connect.php";
	
	//save hospital code
	$hosId = $_POST["updateBed"];

	//save user inputted number of beds
	$input = $_POST["newCount"];

	//build query to update number of hospital beds
	$query  = "UPDATE hospital SET numofbed = '$input' WHERE hoscode = '$hosId';";

	//connect to database, send in query
	$result = mysqli_query($connection, $query);

	//if query fails
	if(!$result) {
		die("Database connection failed.");
	}
	//else hospital beds was updated succesfully
	else {
		echo "Bed update successful.";
	}

	//close database
	mysqli_close($connection);
?>
