<?php 
    require("log.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style type="text/css">
        a {
            text-decoration-line: none;

        }

        a:hover {
            color: #0070c9;
            transform: scale(1.01);
            transition: all .3s ease-in-out;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/jquery-ui.min.js"></script>
    <script src="scripts/formValidator.js"></script>
    <script src="scripts/color.js"></script>
    <script src="scripts/slideshow.js"></script>
    <script src="scripts/main.js"></script>

   <script type="text/javascript">
      function dropdown(){
        $("#dropdown").slideToggle();
      }


  </script>

    <title>Back To School</title>
</head>

<body>
    <?php require("header.php"); ?>
  <div style="width: 1200px; margin: 0 auto;">
    <div id='slideshow'>
        <div id="slideshowPhotos">
        </div>
        <div class="slideshow-title">Keep Trying! Trying new things early on in life will help you determine the path you take in the future.
        </div>
        <div id="slideshow-controls">
        
        </div>
        <div style="left: 20px;transform: rotateY(180deg);" class="slideshow-arrow" onclick="SlideImage(1)">
            <img src="images/arrow.png" width="100%">
        </div>

         <div style="right: 20px;" class="slideshow-arrow" onclick="SlideImage(-1)">
            <img src="images/arrow.png" width="100%">
        </div>
    </div>    

    <script type="text/javascript">
        
    </script>

    <div style="margin-top: 70px;opacity: 0;" class="clearfix" id="part1">
        <article  class="article1">
            <img width="64" alt="foto" title="Foto" height="64" src="images/HealthyHabits.png">
            <h3>Healthy Habits</h3>
            <p>Make a plan,then make healthy habits then healthy habits make you.</p>
        </article>
        <article class="article1">
            <img width="64" alt="foto" title="Foto" height="64" src="images/Performance.png">
            <h3>Performance</h3>
            <p>The heights of excellence can only be achieve by those thriving for it. </p>
        </article>
        <article class="article1">
            <img width="64" alt="foto" title="Foto" height="64" src="images/Achievment.png">
            <h3>Achievement</h3>
            <p>A dream becomes a goal when action is taken toward its achievemnet.</p>
        </article>
        <article class="article1">
            <img width="64" alt="foto" title="Foto" height="64" src="images/family.png">
            <h3>Family</h3>
            <p>A tree can not grow without roots to support it, so hold on to it.</p>

        </article>
    </div>
    

<div id="quote" style="font-size: 20px; text-align: center; margin:40px 0px;font-family: Roboto;"><b>"Study hard what interests you the most in the most undisciplined irreverent and orginal manner possible."</b></div>

     <div class="clearfix" style="margin-top: 70px;opacity: 0;" id="part2">
        <article class="article3">
            <h3>Success </h3>
            <p>usually comes to those who are too busy to be looking for it.</p>
        </article>
         <article class="article2">
            <img width="210" height="160" alt="foto" title="Foto"  src="images/Resourses.png">
            <p>A proper study plan and dedication always beats any challenge.</p>
        </article>
        <article class="article2">
            <img width="210" height="160" alt="foto" title="Foto"  src="images/sun.gif">
            <p>Keep your face to the sunshine and you cannot see a shadow. </p>
        </article>
        <article class="article2">
            <img width="210" height="160" alt="foto" title="Foto"  src="images/teacher.png">
            <p>Discipline is the bridge between goals and accomplishment.</p>
        </article>

    </div>

    </div>
  </div>

  <div class="goToTop">
    <a onclick="OpTopPressed();" href="#top">
      <i class="arrow up"></i>
     </a> 
  </div>

<div style="position: fixed;left: 20px;bottom: 40px;width: 40px;height: 40px;background-color: black; padding: 10px;border-radius: 50px;" onclick="changeColors();">
    <img id="colorChanger" src="images/sun.png" width="100%" height="100%" alt="">
</div>

<?php include("footer.php"); ?>

</body>

</html>