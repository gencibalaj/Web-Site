<?php

require("connectDB.php");

if(!empty($_GET['q'])){
	$q = $_GET['q'];
	$query = "SELECT * FROM infos WHERE email LIKE '%$q%';"; 	
} else {
	$query = "SELECT * FROM infos;";	
}



$result = mysqli_query($conn, $query)  or die("Could not connect database " .mysqli_error($conn));

// Create connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


echo "<table><tr><th style='background-color:green;'>Email</th><th>Name</th><th>Last Name</th><th>Birthday</th><th>Password Hash</th><th>Phone</th><th>Gender</th><th>Status</th><th>Confirmed</th><th>token</th></tr>";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	
      echo "<tr  onclick='selected(this)'><td>{$row['email']}</td><td>{$row['name']}</td><td>{$row['lname']}</td><td>{$row['brth']}</td><td>{$row['pswhash']}</td><td>{$row['phone']}</td><td>{$row['gender']}</td><td>{$row['status']}</td><td>{$row['confirmed']}</td><td>{$row['token']}</td></tr>";
       
        
   }

   	echo "</table>"


?>	