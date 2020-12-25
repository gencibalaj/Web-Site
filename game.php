<!DOCTYPE html>
<html lang="en">
<head>
	<title>Game</title>
	<meta charset="utf-8">
	<style type="text/css">
		body {
			background:radial-gradient(#FF9800, #F44336);
   
		}

		#Game {
			border:10px transparent dashed;
			border-image: url('images/border.png') 15 round;
		}


		button{
			padding: 5px;
			width: 30px;
			height: 30px;
			background: transparent;
			color: white;
			border: 2px dashed white;
		}
		#top {
			position: absolute;
			top:0;
			left: 30px;
		}
		#left {
			position: absolute;
			top:30px;
			left: 0;	
		}
		#right {
			position: absolute;
			top:30px;
			left: 60px;	
		}
		#down {
			position: absolute;
			top:60px;
			left: 30px;
		}

	</style>
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/game.js"></script>
</head>
<body>
	<div style="width: 1000px; margin: 40px auto;">
		<div style="display: inline-block;position: relative;vertical-align: middle;">
			
			<div id="div1" style="border: 1px solid white;height: 50px;width: 50px;float: left;" ondrop="drop(event)" ondragover="allowDrop(event)">
				
			</div>
		
		<div id="div2" style="border: 1px solid white;height: 50px;width: 50px;float: right;" ondrop="drop(event)" ondragover="allowDrop(event)">
			<img id="drag1" src="images/sun.png" draggable="true" ondragstart="drag(event)" width="50">
		</div>
		
			<div style="text-align: center;color: white;">Score:
				<span id="score">100</span><br />
				Best Score: <span id="BestScore"></span>
			</div>
			<canvas id="Game" width="500" height="500"></canvas>
			<div style="position: absolute; bottom: 120px;right: 100px">
				<button id="top" onmousedown="topPressed=true;" onmouseup=" topPressed = false;">T</button>
				<button id="left" onmousedown="leftPressed=true;" onmouseup="leftPressed = false;">L</button>
				<button id="right" onmousedown="rightPressed=true;" onmouseup=" rightPressed = false;">R</button>
				
				<button id="down" onmousedown="downPressed=true;" onmouseup=" downPressed = false;">D</button>
			</div>	
		</div>
		<div style="display: inline-block;vertical-align: middle;">
			<canvas id="canvas1" width="400px" height="300px" >
			</canvas>
		</div>
		<p><a style="color: white;" href="Score.php">View Scores</a></p>

		
		
	</div>

	<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("drag", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("drag");
  ev.target.appendChild(document.getElementById(data));
}
</script>

</body>
</html>




