<?php
	
	session_start();
	require("connectDB.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//$email = $_POST["email"];
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$salt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT salt FROM infos WHERE email='$email';"))['salt'];

		$passHash = sha1($_POST["password"].$salt);
		$remember = $_POST["remember"];

		$query  = "SELECT email FROM infos WHERE email = '$email' AND pswhash = '$passHash';";
		//echo $passHash;
		$result =  mysqli_query($conn, $query); 

		if(mysqli_num_rows($result) > 0){

			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if(isset($remember)){
				$token = md5(generateRandomString()).base64_encode(time()+24*3600);
				$query1 = "UPDATE infos SET token = '$token' WHERE email = '$email'";
				mysqli_query($conn, $query1);
				setcookie("u_token",$token,time()+24*3600);
				setcookie("u_email",$_POST['email'],time()+24*3600);
			}
			$_SESSION["user_id"] = $row['email'];
			$to = (empty($_GET['r'])) ? "index.php" : $_GET['r'];
		 	header("Location: ".$to);
		}else {
			header("Location: login.php?error=1");
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/login.css">
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
</head>
<body>


		<div id="divForm">
				<h2 class="header_title">TIME FOR SCHOOL</h2>
			<form action="" method="post">	
				<input class="text_input" autocomplete="false" type="text" placeholder="Email" name="email" autocomplete="on" autosave="on" required="true">
				<input class="text_input" type="password" placeholder="Password" value="" name="password" required="true">

				<p style="text-align: left;font-size: 20px;"><input style="transform: scale(1.7);" type="checkbox" name="remember"> Remember Me</p>
				<p style="color: red;font-size: 15px;"><?php echo (isset($_GET['error'])) ? "Password or Email is Worng" : ""; ?></p>
				<input class="submit_input" type="submit" value="LOGIN" name="submit">
			</form>
			
		</div>

</body>
</html>
