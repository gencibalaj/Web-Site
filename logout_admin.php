<?php 
	session_start();
	unset($_SESSION['admin_id']);
	if(isset($_COOKIE['token'])){
		setcookie('token', '', time()-24*3600);
		setcookie('a_username', '', time()-24*3600);
	}
	session_destroy();
	header("Location: adminlogin.php");
	die();
?>