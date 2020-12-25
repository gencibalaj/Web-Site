<?php
	//WriteNewScore();
	session_start();
	$table = "";
	if(isset($_POST['score'])){
		WriteNewScore();
		die();
	}else{
		ReadFile1();
	}

	function WriteNewScore(){
		$f = fopen("score.txt", "a");
		fwrite($f, sprintf("%s : %.2f\n",$_SESSION['user_id'],$_POST['score']));
		fclose($f);
	}

	function ReadFile1(){
		$f = fopen("score.txt", "r");
		$txt = fread($f, filesize("score.txt"));
		$txt = preg_split("#\n#", $txt);
		$array = array();
		for($i = 0; $i < sizeof($txt)-1; $i++){
			$data = preg_split('#\s:\s#', $txt[$i]);
			$GLOBALS['table'] .= "<tr><td>".$data[0]."</td><td>".$data[1]."</td></tr>";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<tr><th>USER</th><th>SCORE</th></tr>
		<?php echo $table; ?>
	</table>
</body>
</html>