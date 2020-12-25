<?php 
	require("connectDB.php");
	if(isAdminLogedIn()){
		$q = "TRUNCATE table Chat;";
		mysqli_query($conn,$q);
	}else {
		die();
	}
?>