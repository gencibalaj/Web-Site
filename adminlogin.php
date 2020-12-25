<?php
	session_start();
	require("connectDB.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$remember = $_POST["remember"];
		$password = md5($password);
		$query  = "SELECT username FROM admins WHERE username = '$username' AND passHash = '$password';";
		$result =  mysqli_query($conn, $query); 

		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if(isset($remember)){
				$token = md5(generateRandomString()).base64_encode(time()+24*3600);
				$query1 = "UPDATE admins SET token = '$token' WHERE username = '$username'";
				mysqli_query($conn, $query1);
				setcookie("token",$token,time()+24*3600);
				setcookie("a_username",$_POST['username'],time()+24*3600);
			}
			$_SESSION["admin_id"] = $row['username'];
			header("Location: adminpanel.php");
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/login.css">
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
</head>
<body>


		<div id="divForm">
				<h2 class="header_title">ADMIN</h2>
			<form action="adminlogin.php" method="post">	
				<input class="text_input" autocomplete="false" type="text" placeholder="Username" name="username" autocomplete="on" autosave="on" required="true">
				<input class="text_input" type="password" placeholder="Password" value="" name="password" required="true">

				<p style="text-align: left;font-size: 20px;"><input style="transform: scale(1.7);" type="checkbox" name="remember"> Remember Me</p>
				<input class="submit_input" type="submit" value="LOGIN" name="submit">
			</form>
			
		</div>

</body>
</html>
