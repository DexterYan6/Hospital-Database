<?php
      	//this file returns a list of hospitals


      	//connect to db
	include "connect.php";

      	//build query
      	$query = "SELECT * FROM hospital;";

      	//connect to database
      	$result = mysqli_query($connection, $query);

      	//if query fails
      	if (!$result) {
      		die("Query failed.");
      	}

      	//loop through hospitals
      	while ($row = mysqli_fetch_assoc($result)) {
     	    echo "<option value ='" ."$row[hoscode]"."'>" .$row["hoscode"] .": " .$row["hosname"] .", " .$row["prov"] ."</option>";
	}

	//free result
	mysqli_free_result($result);

	//close db
	mysqli_close($connection);
?>
