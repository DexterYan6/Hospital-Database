<?php
	//file to assign doctor to patient
	include "connect.php";
	
	//save doctor license num
	$doc = $_POST["assignDoc"];
	
	//save doctor num
	$patient = $_POST["assignPat"];

	//build query to check if existing relationship exists
	$check = "SELECT * FROM looksafter;";

	//connect to database, send query
	$result1 = mysqli_query($connection, $check);

	//if query fails
	if(!$result1) {
		die("Database query failed.");
	}
	
	$count = 0;
	while($row = mysqli_fetch_assoc($result1)) {
		if($row["licensenum"] == $doc && $row["ohipnum"] == $patient) {
			$count += 1;
			break;
		}
	}

	if($count == 0) {
		//build query to insert relationship
		$query = "INSERT INTO looksafter(licensenum, ohipnum) VALUES ('$doc', '$patient');";
		
		//connect to database, send query
		$result2 = mysqli_query($connection, $query);
		
		//if query fails
		if(!$result2) {
			die("Database connection failed.");
		}
		//else there was no problems inserting relationship
		else {
			echo "Relationship added successfully.";
		}
	}
	else {
		echo "Patient already assigned to this doctor.";
	}
	
	//close database
	mysqli_close($connection);
?>
