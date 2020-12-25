<?php 
     session_start();
    require("connectDB.php");
    $loggedin = isUserLogedIn();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/books.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet"> 
	<script src="scripts/jquery.min.js"></script>
    <script src="scripts/jquery-ui.min.js"></script>
    <script src="scripts/books.js"></script>
	 <style type="text/css">
        a {
            color: grey;
            text-decoration-line: none;

        }

        a:hover {
            color: #0070c9;
            transform: scale(1.01);
            transition: all .3s ease-in-out;
        }

        a:visited {
        }
        
    </style>
    <script>
        $(document).ready(function(){
            $("dt").add("dd").css("font-family","Helvetica");
        });
    </script>

    <script type="text/javascript">
      function dropdown(){
        $("#dropdown").slideToggle();
      }
  </script>
</head>
<body>
    <?php require("header.php"); ?>


	<div style="width: 800px; margin: 20px auto;">
	<div class="mainContainer">
			<h2 style="color: white;">AUDIO BOOKS</h2>
			 <div class="clearfix">
			 		<div class='leftContainer'>
			 			<div id="divImg" onclick="playBook()">
			 				<img id= "poster" src="images/book1.jpeg" width="100%" height="100%">
			 				<div id="description">
			 					<h3 id="book-title"></h3>
			 					<p style="text-align: center;color: white;font-size: 10pt;margin:0px;">(Click To Play)</p>
			 					<div>
				 					<p id="description-text">
				 					</p>

				 					<div style="width: 30%; height: 100%;float: left;text-align: center;">
				 						<canvas id="star" width="43" height="43"></canvas>
				 						<p style="text-align: center; display: inline-block; color: lightgray;width: 100%;"><span id="rating"></span>/10</p>
				 					</div>
			 					</div>
			 					<div>
			 						<p id="author" style="color: lightgray; font-family: arial; font-weight: bold;float: left">Author:</p>
			 						<p id="pages" style="color: lightgray; font-family: arial; font-weight: bold;float: right;">199 Pages</p>
			 					</div>	
			 				</div>
			 			</div>
			 		</div>
			 		<div class="rightContainer">
			 			<div class="grid scroll">
			 				<ul id="list">
			 					
			 					
			 				</ul>
			 			</div>
			 		</div>
			 </div>
		</div>

		<div style="font-size: 20px; text-align: center;color:white;margin:30px 0px;font-family: Roboto;font-style: italic;">"Study hard what interests you the most in the most undisciplined irreverent and orginal manner possible."</div>
      
        <div class="DivList">
            <ul type="square">
                <li>Education
                    <ul>
                        <li>Social Sciences</li>
                        <li>Natural Sciences</li>
                    </ul>
                </li>
                <li>Art
                    <ul>
                        <li>Modern Art</li>
                        <li>Classic Art</li>
                    </ul>
                </li>
                 <li>Tech
                    <ul>
                        <li>Computer</li>
                        <li>Mobile</li>
                    </ul>
                </li>
            </ul>
        </div>    
        <div class="DivList">
            <dl>
                <dt>Social Sciences</dt>
                <dd>The scientific study of human society and social relationships</dd>
                <dt>Natural Sciences</dt>
                <dd>Natural science is a branch of science concerned with the description, prediction, and understanding of natural phenomena. </dd>
            </dl>   
        </div>
	</div>	

	<div id="FullDiv">
		<div id="playDiv">
			<div onclick="closeFullDiv();" style="width: 30px;height: 30px;float: right;">
				<img src="images/close.png" width="100%">
			</div>
			<h3 style="color: white;">Audio Book</h3>
			<audio id="audio" controls >
			</audio>
			<div style="margin-top: 20px;">
                <a id="pdf" href="" target="_blank">
				    <img src="images/Audible.png" width="40px">
                </a>
			</div>
		</div>
	</div>

    <div id="Login" style="display: none;">
        <div><a href="login.php">LOGIN</a></div>
        <div><a href="registration.php">REGISTER</a></div>
    </div>

    <script>
        function ShowLogin(){
            document.getElementById('Login').style.display = 'block';
        }

        <?php 
            $query = "SELECT * FROM Books;";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $link = ($loggedin) ? "files/Books/".$row['source'] :  "javascript:ShowLogin();";
                //echo $link;
                echo 'json.push(new Book("'.$row['title'].'",
                        "'.$row['description'].'",
                        "'.$row['cover'].'",
                        "'.$row['pages'].'",
                        "'.$row['author'].'",
                        "'.$row['rating'].'",
                        "audio/book1.mp3",
                        "'.$link.'"));' . "\n\n\t\t";
            }
        ?>
    </script>

    <?php include("footer.php");?>
</body>
</html>