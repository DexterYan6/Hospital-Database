<?php
	//add a doctor to the database
	
	//connect to database
	include "connect.php";
	
	//store doctor information
	$license = $_POST["licensenum"];
	$first = $_POST["firstname"];
	$last = $_POST["lastname"];
	$licedate = $_POST["licensedate"];
	$birthdate = $_POST["birthdate"];
	$worksat = $_POST["hosworksat"];
	$special = $_POST["speciality"];
	
	//check if doctor number already exists in database
	$exist = "SELECT licensenum FROM doctor;";

	//connect to database
	$result = mysqli_query($connection, $exist);
	//if query fails
	if(!$result){
		die("Database connection failed.");
	}
	
	$counter = 0;
	while($row = mysqli_fetch_assoc($result)) {
		if($row["licensenum"] == $license) {
			$counter += 1;
			break;
		}
	}
	
	if($counter == 0) {
		//build query to insert data into database
		$query = "INSERT INTO doctor(licensenum, firstname, lastname,licensedate, birthdate, hosworksat, speciality) VALUES ('$license', '$first', '$last', '$licedate', '$birthdate', '$worksat', '$special');";
		$newRes = mysqli_query($connection, $query);
		if(!$newRes) {
			die("Database query failed.");
		}
		else {
			echo "Doctor successfully added.";
		}
	}
	else {
		echo "This license already exists in database. Doctor was not added.";
	}
	
	//close database
	mysqli_close($connection);

