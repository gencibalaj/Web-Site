<?php 
    session_start();
    require_once("connectDB.php");
    $html = "";
    if(isUserLogedIn()){
        $email = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : $_COOKIE['u_email'];
        $html = '<span>'.$email.'</span> |
            <a target="_blank" href="logout.php"><u>Logout</u></a> ';

    } else {
        $html = '<a target="_blank" href="registration.php"><u>Register</u></a> |
            <a target="_blank" href="login.php"><u>Student Login</u></a>';
    }
?>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>
<header>
    <div id="top" class="">
        <div class="socialNetworks">
            <a target="_blank" href="https://www.linkedin.com/">
                <img width="30" title="Linkedin" alt="linku per linkedin" src="images/linkedin60x60.png"></a>
            <a target="_blank" href="https://twitter.com/">
                <img width="30" title="Twitter" alt="linku per twitter" src="images/twitter60x60.png"></a>
            <a target="_blank" href="https://plus.google.com/discover">
                <img width="30" title="Google PLus" alt="linku per google plus" src="images/googleplus60x60.png"></a>
            <a target="_blank" href="https://www.pinterest.com/">
                <img width="30" title="Pinterest" alt="linku per pinterest" src="images/pinterest60x60.png"></a>
            <a target="_blank" href="">
                <img width="30" alt="linku per newsfeed" title="RSS Feed" src="images/newsfeed60x60.png"></a>
        </div>
        <div class="onToplinks">
            <?php echo $html; ?>
            <p id="LastVisited" style="text-align: right;color: #929292;margin-top: 7px; font-size: 10pt;"></p>

        </div>
    </div>
    <div id="logoContainer" class="">
        <a class="time4shcool" href="index.php">Time 4 School</a>
        <form id="search" action="#" method="POST">
           <input type="search" name="search" autocomplete="off" onkeyup="ELTI(this);" size="20" placeholder="search our website..">
           <script>
                function ELTI(input){
                    var keyword = input.value;
                    $("#SearchContent").find("ul").empty();
                    if(keyword.length > 2){
                        $("#SearchContent").find("ul").load("search.php?k="+encodeURI(keyword));
                    }

                }
           </script>
           <input type="submit" value="Search">
           <div id="SearchContent">
               <ul>

               </ul>
           </div>
        </form>
    </div>
    
    <nav>
        <ul>
             <li><a href="index.php">HOME</a></li>
             <li><a href="books.php">BOOKS</a></li>
             <li><a href ="parents.php">PARENTS</a></li>
             <li><a href ="tutorials.php">TUTORIALS</a></li>
             <li><a href ="game.php">FUN</a></li>
             <li><a href ="chat.php">CHAT</a></li> 
             <li onmouseenter="dropdown();" onmouseleave="dropdown();"><a href="#">MORE</a>
                <i class="arrow down"></i>
                <ul id="dropdown">
                    <li>
                        <a href="gadgets.php">GADGETS</a>       
                    </li>
                    <li>
                        <a href="contact.php">CONTACT US</a>       
                    </li>
                </ul>
             </li>
        </ul>
      </nav>
      </header>