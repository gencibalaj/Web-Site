<?php
	require("connectDB.php");
	if(!isAdminLogedIn()){
		header("Location: adminlogin.php");
		die();	
	}
	$file = fopen("log.json", "r");
	$text = fread($file, filesize("log.json"));
	$json = json_decode($text);
	
	$values = array();
	$keys =array_keys($values);

	for($i = 0; $i < sizeof($json); $i++){
		$country = $json[$i]->country;
		$values[$country] = $values[$country]+1;
	}

	$text = "";
	ksort($values, SORT_STRING | SORT_FLAG_CASE);
	foreach ($values as $key => $value) {
		$text .= sprintf('{y: %.2f, label: "%s"},',$value/sizeof($json)*100 ,$key);	
	}
?>
<!DOCTYPE HTML>
<html>
<head>

	<style type="text/css">
		.canvasjs-chart-credit {
			display: none;
		}
	</style>
<script>
</script>
</head>
<body>
<div id="chartContainer" style="height: 600px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type="text/javascript">

setTimeout(function(){

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Country"
	},
	data: [{
		type: "pie",
		startAngle: 30,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [<?php echo $text; ?>]
	}]
});
chart.render();
},1000);

</script>




</body>
</html>