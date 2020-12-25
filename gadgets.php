<?php 
    session_start();
    require("connectDB.php");
    $loggedin = isUserLogedIn();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/gadgets.css">
    <link rel="stylesheet" type="text/css" href="styles/header.css">
	 <link rel="stylesheet" type="text/css" href="styles/footer.css">
    <script src="scripts/jquery.min.js"></script>
	<title>Gadgets</title>
	<style>
	footer{
		margin:0 auto;
	}

    .LinksAboutTech ul {
        list-style: none;
        padding: 0px;
        text-align: center;
    }

    .LinksAboutTech  ul li {
        display: inline-block;
        width: 20px;
        height: 20px;
        margin: 5px;
        background-color: blue;
        padding: 5px;
        border-radius: 40px;
        text-align: center;
        
    }

    .LinksAboutTech ul li a {
        font-weight: bolder;
        color: white;
    }
    
    a:hover {
        color: white;
    }

	footer p{
			font-family: arial;
			
			font-weight: bold;
			background:linear-gradient(45deg, #09009f, #00ff95 80%);
            -webkit-background-clip: text;
  			-webkit-text-fill-color: transparent;
   			transition: 0.3s;
			}
		
	</style>
	<script>
		var a=false;
        var teksti; 
		$(document).ready(function(){
  		$("#h2set").on("click",function(){
  		
	  		if(a)
	  		{
                teksti=$("#h2set").text();
		    	$("#h2set").text("Getting new gadgets is part of the right way back to School.");
		    	a=false;
	    	}
	    	else 
	    	{
		    	$("#h2set").text(teksti);
		    	a=true;
	    	}
    	});
        });

	</script>
	
    <script type="text/javascript">
      function dropdown(){
        $("#dropdown").slideToggle();
      }

       function ShowLogin(){
            document.getElementById('FullDiv').style.display = 'block';
        }

       function Login(){
            location.href= "login.php?r="+encodeURI(location.href);
       } 

  </script>
</head>
<body style="color: rgba(0,0,0,.65)" >
<?php require("header.php"); ?>    

        <div class="LinksAboutTech">

                <h2 id="h2set">The best part of going back to school is getting new gadgets.</h2>

                <?php 
                    $page = isset($_GET["p"]) ? $_GET["p"] : 1;
                    if(!$loggedin && $page > 1){
                        $page = 1;
                        echo "<script>window.onload = ShowLogin;</script>";
                    }

                    $query1 = "SELECT COUNT(*) FROM gadgets";

                    $query = "SELECT * FROM gadgets LIMIT ".(($page-1)*6).", " . 6 . ";";
                    //echo $query;
                    $result = mysqli_query($conn, $query);
                    
                    $rowNr = mysqli_query($conn, $query1);
                    $rowNr = mysqli_fetch_array($rowNr,MYSQLI_NUM)[0];
                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                        //print_r($row);
                        $img = $row['img'];
                        $link = $row['link'];
                        $title = $row['title'];
                        
                       echo '<div class="PhotosAboutGadgets">
                                <img  class="PhotosAboutGadgets" src="images/'.$img.'" alt="lazystudent">
                                <a target="_blank" href="'.$link.'">
                                    <p>'.$title.'</p>
                                </a>
                            </div>';  

                    }



                ?>
                <ul>
                    <?php 
                        for($i = 0; $i < ceil($rowNr/6); $i++){
                            echo "<li><a href='gadgets.php?p=".($i+1)."'>".($i+1)."</a></li>";
                        }
                    ?>
                </ul>
            </div>

        <div id="FullDiv" style="display: none;" onclick="document.getElementById('Login').style.display = 'none'; this.style.display = 'none';">
            <div id="Login">
                <p style="font-style: medium; text-align: center;">You should login to continue. If you don't have an<br /> account please register.</p>
                <div onclick="Login();">LOGIN</div>
                <div><a style="color: white;" href="registration.php">REGISTER</a></div>
            </div>
        </div>

        <?php include("footer.php"); ?>
</body>
</html>