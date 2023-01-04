<?php
	//delete doctor from database

	//connect to db
	include "connect.php";
	
	//inputted doctor code
	$doc = $_POST["deleteDoc"];
	
	//Query to check if doctor exists in database
	$exist = "SELECT * FROM doctor;";

	//Query to delete doctor
	$query = "DELETE FROM doctor WHERE licensenum = '$doc';";

	//connect to database
	$result1 = mysqli_query($connection, $exist);

	//if connection failed
	if(!$result1) {
		die("Database connection failed.");
	}
	
	$count = 0;
	//see if doctor exists in database
	while($row = mysqli_fetch_assoc($result1)) {
		if($row["licensenum"] == $doc) {
			$count += 1;
			break;
		}
	}
	
	//if doctor exists in database carry on with next step
	if($count != 0) {
		//build query to check if doctor has patients
		$check = "SELECT licensenum FROM looksafter WHERE licensenum = '$doc';";
		
		//build query to check if doctor is head doc
		$check2 = "SELECT * FROM hospital WHERE headdoc = '$doc';";

		//connect to database
		$result2 = mysqli_query($connection, $check);
		$result3 = mysqli_query($connection, $check2);

		//if connection failed
		if(!$result2) {
			die("Database connection failed.");
		}
		
		if(!$result3) {
			die("Database connection failed.");
		}

		$count2 = 0;
		$count3 = 0;
		
		while($row = mysqli_fetch_assoc($result2)) {
			if($row["licensenum"] == $doc) {
				$count2 += 1;
				break;
			}
		}

		while($row = mysqli_fetch_assoc($result3)) {
			if($row["headdoc"] == $doc) {
				$count3 += 1;
				break;
			}
		}
		if($count2 != 0){
			echo "Doctor has patients, unable to delete. ";
		}
		else if($count3 != 0) {
			echo "Doctor is a head doctor, unable to delete.";
		}
		else {
			//run delete query, send it to database
			$result4 = mysqli_query($connection, $query);
			//if delete fails
			if(!$result4) {
				die("Delete failed.");
			}
			//else delete has no problems
			else {
				echo "Doctor deleted successfully.";
			}
		}

	}
	else{
		echo " Doctor does not exist in database.";
	}
	
?>
