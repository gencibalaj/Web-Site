<?php require_once("connectDB.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tutorials</title>
	<link rel="stylesheet" type="text/css" href="styles/video.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
	<link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet"> 
	<script src="scripts/jquery.min.js"></script>
    <script src="scripts/jquery-ui.min.js"></script>
    <script src="scripts/video.js"></script>
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
			<h2 style="color: white;">VIDEO TUTORIALS</h2>
			 <div class="clearfix">
			 		<div class='leftContainer'>
			 			<div id="divImg" onclick="playBook()">
			 				<video id="video" controls autoplay>
                                <source src="images/fiek.mp4" type="video/mp4">                    
                            </video>
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
        
        <script>
            <?php 
            $course = (isset($_GET['cid'])) ? $_GET['cid'] : 1;

            $query = "SELECT * FROM Videos WHERE cid=$course;";

            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $cover = "";
                if(preg_match('#https?://#', $row['cover'])){

                }
                echo 'json.push(new Video("'.$row['title'].'",
                        "'.$row['description'].'",
                        "'.$row['cover'].'",
                        "'.$row['length'].'",
                        "'.$row['author'].'",
                        "'.$row['rating'].'",
                        "files/Videos/'.$row['source'].'"));' . "\n\n\t\t";
            }
        ?>
        </script>

        <div class="DivList">
            <ul type="square">
                <?php 
                    $q = "SELECT * FROM courses;";
                    $result = $conn->query($q);
                    while($row = $result->fetch_assoc()){
                        echo "<li><a style='color:white;text-decoration: underline;' href='tutorials.php?cid=".$row['cid']."'>".$row['ctitle']."</a></li>";
                    }
                ?>
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

       <?php
            include("footer.php");
        ?>
</body>
</html>