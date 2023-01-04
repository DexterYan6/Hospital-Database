<?php
//temporary test file

//connect to db
include "connect.php";

//build query
$query = "SELECT DISTINCT speciality FROM doctor;";
$result = mysqli_query($connection, $query);

//if query fails
if(!$result){
   die("Database connection failed.");
}

//loop through doctor information
while($row = mysqli_fetch_assoc($result)) {
   echo "<option value = '" . $row["speciality"]."'>" .$row["speciality"]."</option>";
}

//free result
mysqli_free_result($result);

//close db
mysqli_close($connection);
