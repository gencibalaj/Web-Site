<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require('connectDB.php'); 
	
	$errors = array();
	$all = "[]";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name =$_POST['name'];
		$gender = ($_POST['gender'] == 'male') ? 0 : 1;
		$lname =$_POST['lname'];
		$email =$_POST['email'];
		$phone =$_POST['phone'];
		$bday =$_POST['bday'];
		$status = ($_POST['status'] == 'parent') ? 0 : 1;
		$password =$_POST['password'];
		$password1 = $_POST['password1'];
		$termOfUse =$_POST['termOfUse'];
		//echo $gender . "    " . $status;

		if(empty($name)){
			$errors[] = "name";
		}

		if(empty($lname)){
			$errors[] = "lname";
		}

		if(empty($email) || !preg_match('#^[\w\.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$#',$email)){
			$errors[] = "email";
		}
		if(empty($phone) || !preg_match('#[\+\d]+#', $phone)){
			$errors[] = "phone";
		}
		if(empty($bday) || time() < strtotime($bday)){
			$errors[] = "bday";
		}	

		if(empty($password) || !StrongPass($password)){
			$errors[] = "password";
		}
		if($password!=$password1)
		{
			$errors[] = "passwordnot";
		}
		if(!isset($status)){
			$errors[] = "status";
		}		
		if(!isset($gender)){
			$errors[] = "gender";
		}		
		if(empty($termOfUse) ){
			$errors[] = "termOfUse";
		}
		if(sizeof($errors) == 0){
			$salt = generateRandomString();
			$passHash = sha1($password.$salt);
			$insert = [$name,$lname,$email,$bday,$salt,$passHash,$phone,$gender,$status];
			
			array_walk($insert, "sqlInjection");

			$query = "INSERT INTO infos () VALUES ('{$insert[0]}','{$insert[1]}','{$insert[2]}','{$insert[3]}','{$insert[4]}','{$insert[5]}','{$insert[6]}',{$insert[7]},{$insert[7]},'0','')";
			echo $query;
			mysqli_query($conn, $query);
			header("Location: reg.php?email=".$email );
			die();		
		}
		$all = "['$name','$gender','$lname','$email','$bday','$status','$password','$phone','$termOfUse']";
	}

	function sqlInjection(&$value){
		global $conn;
		$value = mysqli_real_escape_string($conn,$value);
	}

	function StrongPass($pass){
		$pattern = "#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.{8,})#";
		return preg_match($pattern, $pass);
	}

	$errorString = '["'.implode('","',$errors).'"]';
	//echo $errorString;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	<style type="text/css">

	@font-face
		{
			font-family: niramit;
			src:url(fonts/niramit.woff2);
		}	

	body {
		background-color: darkslategrey;
		font-family: niramit; 
		color: white;
	}

	form {
		display: inline-block;
		text-align: left;
	}

	input[type="range"] {
		color: blue;
	}

	form input[type="text"],input[type="email"],input[type="password"] {
	background-color: #f2f2f2;
	font-size: 12pt;
	padding: 10px 7px 10px 8px;
	width: 100%;
	border: none;
	box-sizing:border-box;
	margin-bottom: 10px; 
}

select, input[list] {
	background-color: #f2f2f2;
	padding: 10px;
	border: 1px solid gray;
	width: 100%;
	margin-bottom: 10px; 
	box-sizing:border-box;
}

form input[type="submit"] {
	background-color: #f2f2f2;
	width: inherit;
	padding: 10px;
	box-sizing:border-box;
	margin-bottom: 10px; 
}
h1 {
	font-size: 40pt;
	color: #c7fffc;
}

form input[type="date"] {
	background-color: #f2f2f2;
	border: 1px solid gray;
	padding: 10px;
	width: 100%;
	box-sizing:border-box;
	margin-bottom: 10px; 
}

.error {
	color: red;
	font-weight: bold;	
}

.inputError {
	border: 1px solid red !important;
}

.inputError::placeholder {
}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="scripts/formValidator.js"></script>
</head>
<body>



	<div style="width: 400px;text-align: center;margin:0px auto;">
		<h1>REGISTER</h1>
		<form id="Form"  method="POST" action="registration.php">

			<input type="text" style="width: 49.4%" name="name" autofocus placeholder="First Name" >
			
			<input type="text"style="width: 49.4%" name="lname" placeholder="Last Name"><br />
			<p class="error" style="display: none;">
				You must fill the fields;
			</p>
			
	
			<input type="text" name="email" placeholder="Email" onblur="checkUser(this);" autocomplete="on"><br />
			<p class="error" style="display: none;">
				Email format is wrong.
			</p>
			<p style="display: none;" class="error" id="registred">Email is already registred</p>
	
			<input type="text" name="phone" placeholder="Phone"><br />
			<p>Birthday:</p>
			<input type="date" name="bday" placeholder="Birthday"><br />
			<p class="error" style="display: none;">
				Birthday is wrong.
			</p>

			<br/>
			<input id="pw" type="password" name="password" placeholder="Password" form="Form">
			<br/>
			<div style="display: none;" class="error">
				<p>Password should contain at least:</p>
				<ul type="circle">
					<li>1 Uppercase</li>
					<li>1 Number</li>
					<li>lentgh 8</li>
				</ul>
			</div>
			<input type="password" placeholder="Confirm Password" name="password1">
			<p style="display: none;" name="passwordnot"  class="error">Password does not match</p>
			<p>Gender:</p>
			<input type="radio" name="gender" value="male"> Male <br />
			<input type="radio" name="gender" value="female"> Female <br />
			<p class="error" id="genderError" style="display: none;">You must choose one of the options</p>
		

			<p>What are you?</p>

			<input type="radio" name="status" value="parent"> Parent <br />
			<input type="radio" name="status" value="student"> Student <br />
			<p class="error" style="display: none;">Please check one of opsions</p>
			
			<br/>
			<input type="checkbox" id="term" name="termOfUse" value="termOfUse"> Do you agree with our Term of Use? 
			<br />
			<p class="error" style="display: none;">Please check term of use </p>
			<input type="checkbox" name="emailS"> Do you want to get emails for important updates?
			<br /><br/>
			<keygen name="security">
			<input type="submit" name="submit">

			
		</form>
	</div>

	<script>
		var errors = <?php echo $errorString  ?>;

		for(var i =0; i < errors.length;i++){
			if(errors[i]=="passwordnot")
			{
				$("[name='"+errors[i]+"']").show();
			}
			else{
			$("[name='"+errors[i]+"']").next().next().show();
			}
		}
		var b = <?php echo $all ?>;
		var a = ["name","gender","lname","email","bday","status","password","phone","termOfUse"];
		for(var i = 0; i < a.length; i++){
			if(!errors.includes(a[i])){
				if(a[i] == "gender" || a[i] == "status" || a[i] == "termOfUse"){
					$("[value='"+b[i]+"']").prop('checked',true);
				}else{
					$("[name='"+a[i]+"']").attr("value",b[i]);
				}
			}
		}

		function checkUser(a){
			var url = "checkUser.php?email="+a.value;
			$.getJSON(url, function(result){
      			if(result['error'] == 1){
      				$("#registred").show();
      			}else{
      				$("#registred").hide();
      			}
			});
		}	
	</script>

</body>
</html>