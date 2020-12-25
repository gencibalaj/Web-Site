<?php
	define("SERVERNAME","localhost",true);
	define("USERNAME","root",true);
	define("PASSWORD","new_password",true);
	define("DB","register",true);

	$conn = new mysqli(servername, username, password, db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}



	function verifyToken($token,$username,$t=false){
		if(empty($token)){
			return false;
		}
		global $conn;
		$tokenHash = substr($token, 0, 32);
		$time = substr($token, 32);
		$q = "";
		if($t){
			$q = "SELECT token FROM admins WHERE username='$username';";
		}else{
			$q = "SELECT token FROM infos WHERE email='$username';";
		}
		//echo $q;
		$res = mysqli_query($conn, $q);
		$row = mysqli_fetch_assoc($res);
		$dbToken = substr($row['token'],0, 32);
		if($tokenHash == $dbToken && time() > $time){
			return true;
		}else {
			return false;
		}
	}

	function isUserLogedIn(){
		$user_id =  isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '';
	    $token =  isset($_COOKIE['u_token']) ? $_COOKIE['u_token'] : '';
	    $u_email = isset($_COOKIE['u_email']) ? $_COOKIE['u_email'] : '';
	    if(!(!empty($user_id) || verifyToken($token,$u_email))){
	        return false;
	    }else {
	        return true;
	    }
	}

	function isAdminLogedIn(){
		$admin_id =  isset($_SESSION["admin_id"]) ? $_SESSION["admin_id"] : '';
	    $token =  isset($_COOKIE['token']) ? $_COOKIE['token'] : '';
	    $a_username = isset($_COOKIE['a_username']) ? $_COOKIE['a_username'] : '';
	    
	    if(!(!empty($admin_id) || verifyToken($token,$a_username,true))){
	        return false;
	    }else {
	        return true;
	    }
	}

?>