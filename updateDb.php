<?php
	require("connectDB.php");

	$command = $_GET["c"];

	$ids =urldecode($_GET["ids"]);
	$ids = explode(" ", $ids);

	if($command == 'delete'){
		for($i = 0; $i < sizeof($ids); $i++){
			$queryDelete = "DELETE FROM infos WHERE email = '".$ids[$i]. "' ;";
			echo $queryDelete;
			mysqli_query($conn, $queryDelete); 
		}
	}
?>