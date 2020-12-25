<?php 
	require('connectDB.php'); 
	$email = $_GET["email"];
	$query = "SELECT email FROM infos WHERE email = '$email'";
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) === 0){
		echo '{"error":0}';
	}else{
		echo '{"error":1}';
	}
?>