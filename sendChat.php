<?php
	if(!isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'],"chat.php") === false){
		header('HTTP/1.0 403 Forbidden');
		die("ERORR 403");
	}
	require("connectDB.php");

	
	$message = $_POST['message'];
	$email = $_POST['email'];
	$message = preg_replace('#\bfuck\b#', "f***", $message);

	$emojis = array(":P"=>"😋",":)"=>"😀",":("=>"☹️");
	array_walk($emojis, "searchEmoji");

	
	if(strlen($message)>400){
		die();
	}


	$query = "INSERT INTO Chat () VALUES (default, '$message', '$email', now());";
	mysqli_query($conn, $query);
	$ChatNr = file_get_contents("ChatNr.txt");
	$ChatNr = (int)$ChatNr+1;
	$f = fopen("ChatNr.txt", "w");
	fwrite($f, $ChatNr);
	fclose($f);

	function searchEmoji($value, $key){
		global $message;
		$message = str_replace($key, $value, $message);
	}	
?>