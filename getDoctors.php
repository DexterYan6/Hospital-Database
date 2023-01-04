<?php  
	//this file is to display the doctors in the selected sort order

	//connect to db
	include "connect.php";

	//sort methods are saved as variables
	$sort = $_POST["sort"];
	$order = $_POST["order"];
	$spec = $_POST["filter"];

	//build query
	if($spec == 1) {
		$query = "SELECT * FROM doctor ORDER BY " . $sort ." " . $order .";";
	} 
	else {
		$query = "SELECT * FROM doctor WHERE speciality = '$spec' ORDER BY " . $sort ." ". $order .";";
	}	
	//connect and send query
	$result = mysqli_query($connection, $query);

	//if query fails
	if(!$result) {
		die("databases query failed.");
	}
	
	echo "<table class = 'table' border = '1'>
	<thead class = 'table-light'>
	<tr>
	<th>License Number</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>License Date</th>
	<th>Birth Date</th>
	<th>Works At</th>
	<th>Speciality</th>
	</tr>
	</thead>";

	//display doctor names
	
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>" . $row['licensenum'] . "</td>";
		echo "<td>" . $row['firstname'] . "</td>";
		echo "<td>" . $row['lastname'] . "</td>";
		echo "<td>" . $row['licensedate'] . "</td>";
                echo "<td>" . $row['birthdate'] . "</td>";
                echo "<td>" . $row['hosworksat'] . "</td>";
                echo "<td>" . $row['speciality'] . "</td>";		
		echo "</tr>";
	}
	echo "</table>";
	
	//free result
	mysqli_free_result($result);

	//close database
	mysqli_close($connection);
?>
