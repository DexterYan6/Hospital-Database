<?php
	//file to show which doctors work at hospital
	
	//connect to database
	include "connect.php";
	
	//save hospital code
	$hos = $_POST["hospCode"];

	//build query
	$query = "SELECT firstname, lastname FROM doctor WHERE hosworksat = '$hos';";
	
	//connect to database, send query
	$result = mysqli_query($connection, $query);

	//if query fails
	if(!$result) {
		die("Database connection failed.");
	}
	echo "<table class = 'table' border = '1'>
	<thead class = 'table-light'>
	<tr>
	<th>First Name</th>
	<th>Last Name</th>
	</tr>
	</thead>";

	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row['firstname'] . "</td>";
		echo "<td>" . $row['lastname'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	//free result
	mysqli_free_result($result);
	
	//close database
	mysqli_close($connection);
?>
