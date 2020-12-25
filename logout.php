<?php 
	session_start();
	unset($_SESSION['user_id']);
	if(isset($_COOKIE['u_token'])){
		setcookie('u_token', '', time()-24*3600);
		setcookie('u_email','', time()-24*3600);
	}
	session_destroy();
	header("Location: index.php");
	die();
?>