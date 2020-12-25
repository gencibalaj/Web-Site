<?php 
	require('connectDB.php'); 

	if(isset($_GET["email"])){
		$email = $_GET["email"];

		$link = md5($email."genci".date("H"));

		$data = array('TO' => $email, 'LINK' => urlencode("http://localhost/projekti/reg.php?activation=$link&e=$email"));

		$query = "UPDATE infos SET confirmed = '$link' WHERE email = '$email';";
		mysqli_query($conn, $query);

		$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($data)
		    )
		);
		$context  = stream_context_create($options);
		$result = file_get_contents("http://time4school.000webhostapp.com/mail.php", false, $context);
		echo("An activation link has been sended to your email.");
		
	}elseif (isset($_GET["activation"])) {
		$hash = $_GET["activation"];
		$e = mysqli_real_escape_string($conn,$_GET["e"]);
		$query = "UPDATE infos SET confirmed = 'yes' WHERE email = '$e' and confirmed = '$hash';";
		mysqli_query($conn, $query);
		echo("Your account is atived. <a href='../' >Go to main page</a>");
	}	
?>