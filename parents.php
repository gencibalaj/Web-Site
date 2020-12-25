<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Parents</title>
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
    <link rel="stylesheet" type="text/css" href="styles/parents.css">
    <script src="scripts/jquery.min.js"></script>
    <style>

        #multiple-bg
                        {
                            height:120px;
                            background: url("images/family1.jpg") left center no-repeat, url("images/family2.jpg") right center no-repeat;
                            opacity: 0.6;
                            margin:0;
                            background-origin: content-box;
                            background-size: 200px 150px;

                        }
                        #multiple-cl
                        {
                            column-count: 2;
                            column-gap: 5px;
                            column-fill: balance;
                            

                        }
                     body 
                     {

                            opacity:1;
                            animation: Gradient 3.2s ease infinite;
                    }

                    @keyframes Gradient 
                    {
                        0% { background:linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB)}
                        50% {background:linear-gradient(-45deg, #E73C7E, #EE7752, #23A6D5, #23D5AB)}
                        100% {background:linear-gradient(-45deg, #E73C7E, #23D5AB, #23A6D5, #EE7752)}
                    }
                        
                </style>

    <script>

        function changeFill() 
                {
                    var elms = document.getElementsByClassName('svg')
                    for (var i = 0; i < elms.length; i++) 
                        {
                        elms[i].style.fill = "rgba(" + Math.floor(255 * Math.random()) + ", " + Math.floor(255 * Math.random()) + ", " + Math.floor(255 * Math.random()) +Math.random()+ ")";
                        }
                                     
                }
                    
                     function dropdown(){
                         $("#dropdown").slideToggle();
        }

                 </script>

</head>

<body>
    <?php require("header.php"); ?>


    <div class="grid-container">

        <div class="grid-item" style="grid-column-start:2; grid-column-end:4">
            <h2 id="h2transform" style="text-align: center;"> Eight Ways You Can Help Your Children Succeed At School</h2>

            <section id="multiple-cl">



                As a parent, you are your child's first and most important teacher. When parents and families are involved in their children's schools, the children do better and have better feelings about going to school.In fact, many studies show that what the family does is more important to a child's school success than how much money the family makes or how much education the parents have.There are many ways that parents can support their children's learning at home and throughout the school year. Here are some ideas to get you started!

            </section>
        </div>

        <div class="grid-item" style="grid-row-start:2; grid-row-end:7 ">
            <svg width="150" height="1000">
                <polyline class="svg" points="50 90,0 100,0 190,50 210,100 190,100 100,50 90" onclick="changeFill()" />
                <circle class="svg" cx="50" cy="150" r="30" stroke="linen" stroke-width="4" fill="grey" onclick="changeFill()" />
            </svg>
            <script>

            </script>


        </div>

        <div class="grid-item">
            <article>

                <section>
                    <h3>Develop a partnership with your child's teachers and school staff</h3>
                    1. Meet your child's teacher. As soon as the school year starts, try to find a way to meet your child's teacher. Let the teacher know you want to help your child learn. Make it clear that you want the teacher to contact you if any problems develop with your child. Talk with your child's teacher offers some great tips for developing a partnership with your child's teacher.
                </section>

            </article>
        </div>
        <div class="grid-item">
            <video controls>
                <source src="images/Parents.mp4" type="video/mp4">

            </video>
        </div>

        <div class="grid-item">
            <article>

                <section>
                    <h3>Develop a partnership with your child's teachers and school staff</h3>
                    3. Attend parent-teacher conferences and keep in touch with your child's teacher. Schools usually have one or two parent-teacher conferences each year. You can bring a friend to interpret for you or ask the school to provide an interpreter. You can also ask to meet with your child's teacher any time during the year. If you have a concern and can't meet face-to-face, send the teacher a short note or set up a time to talk on the phone.
                </section>

                
            </article>
        </div>

        <div class="grid-item">
            <figure>
                <img src="images/parents.jpg">
                <figcaption> Parents</figcaption>
            </figure>
        </div>

        <div class="grid-item">
            <article>
                <section>
                    <h3>Support your child academically </h3>
                    <em>4.</em> Find out how your child is doing. Ask the teacher how well your child is doing in class compared to other students. If your child is not keeping up, especially when it comes to reading, ask what you or the school can do to help. It's important to act early before your child gets too far behind. Also be sure to review your child's report card each time it comes out. For more information, see How To Know When Your Child Needs Extra Help.
                </section>
            </article>
        </div>

        <div class="grid-item">
            <figure>
                <img src="images/family.png" alt="family">
                <figcaption>family</figcaption>
            </figure>
        </div>

        <div class="grid-item">
            <article>
                <section>
                    <h3>Develop a partnership with your child's teachers and school staff</h3>
                    <em>6.</em> Make sure that your child gets homework done. Let your child know that you think education is important and that homework needs to be done each day. You can help your child with homework by setting aside a special place to study, establishing a regular time for homework, and removing distractions such as the television and social phone calls during homework time.
                </section>

            </article>
        </div>

        <div class="grid-item">
            <figure>
                <img src="images/kids.png">
                <figcaption> Kids</figcaption>
            </figure>
        </div>
    </div>
    <div id="multiple-bg">
    </div>

     <?php include("footer.php"); ?>
</body>

</html>