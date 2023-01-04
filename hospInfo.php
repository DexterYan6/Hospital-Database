<?php
	//file to display all hosptial info

	//connect to database
	include "connect.php";
	
	//save hospital code
	$hos = $_POST["hospCode"];
	
	//build query to get hospital info from code
	$query = "SELECT hoscode, hosname, city, prov, numofbed, firstname, lastname FROM hospital INNER JOIN doctor ON licensenum = headdoc WHERE hoscode = '$hos';";

	//send queries to database
	$result = mysqli_query($connection, $query);

	//if query fails
	if(!$result) {
		die("Database connection failed.");
	}
	
	echo "<table class = 'table' border = '1'>
	<thead class = 'table-light'>
	<tr>
	<th>Code</th>
	<th>Hospital Name</th>
	<th>City</th>
	<th>Province</th>
	<th>Number of Beds</th>
	<th>Head Doctor</th>
	</tr>
	</thead>";
	
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row['hoscode'] . "</td>";
		echo "<td>" . $row['hosname'] . "</td>";
		echo "<td>" . $row['city'] . "</td>";
		echo "<td>" . $row['prov'] . "</td>";
		echo "<td>" . $row['numofbed'] . "</td>";
		echo "<td>" . $row['firstname'] . " " .$row['lastname'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	
	//free result
	mysqli_free_result($result);

	//close database
	mysqli_close($connection);
?>
