<?php 
	
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']) && !empty($_POST['phone'])){
		$json = file_get_contents("contact.json");
		$new = '{"name":"'.$_POST['name'].'", "email":"'.$_POST['email'].'", "message":"'.$_POST['message'].'"}';

		$json = json_decode($json);
		array_push($json, json_decode($new));
		$json = json_encode($json);
		$f = fopen("contact.json", "w");
		fwrite($f, $json);
		fclose($f);
		echo "Message Sended";
	}else{
		echo "All fields must be filled.";
	}
?>