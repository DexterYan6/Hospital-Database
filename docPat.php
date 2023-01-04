<?php
	//this file shows all patients based on doctor chosen
	include "connect.php";
	
	//get doctor licensenum
	$doctor = $_POST["getDoc"];

	//build query to get doctor 
	$query = "SELECT patient.ohipnum, firstname, lastname FROM patient 
	INNER JOIN looksafter ON patient.ohipnum = looksafter.ohipnum 
	WHERE licensenum = '$doctor';";
	
	//connect to database, send query
	$result = mysqli_query($connection, $query);
	
	//if query fails
	if(!$result) {
		die("Database connection failed.");
	}
	
	//create table
	echo "<table class = 'table' border = '1'>
	<thead class = 'table-light'>
	<tr>
	<th>OHIP Number</th>
	<th>First Name</th>
	<th>Last Name</th>
	</tr>
	</thead>";
	
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row['ohipnum'] . "</td>";
		echo "<td>" . $row['firstname'] . "</td>";
		echo "<td>" . $row['lastname'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	//free result
	mysqli_free_result($result);
	
	//close connection
	mysqli_close($connection);
?>
