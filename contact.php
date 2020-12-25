<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

        #InfoTable table {

            margin: 20px auto;
            font-family: arial;
            align-items: center;
            border-radius: 5px;
            box-shadow: 2px 2px;
            border: 1px solid #0070c9;
            resize: both;
            outline-style: outset;
            outline-color: invert;
            outline-offset: 5px;

        }

        .baseCell {
            background-color: lightyellow;
        }

        #InfoTable td {

            column-span: 20px;
            align-items: center;
        }

        #InfoTable img {
            text-align: center;
            width: 100px;
            height: 100px;
        }

        #InfoTable tr {
            text-shadow: 1px 1px;
            text-align: center;
            align-items: center;
            align-self: center;
        }

        .email {
            word-wrap: break-word;
            max-width: 200px;
        }

        #resizeText {
            resize: both;
            overflow: auto;
        }

        #h2transform {
            transform: skewX(-10deg);
        }

        #submit_transform:hover {
            transform: rotateY(20deg);
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/formValidator.js"></script>
    <script>
        function dropdown(){
        $("#dropdown").slideToggle();
      }
    </script>
    <title>Contact Us</title>
</head>

<body>
   <?php require("header.php"); ?>


    <div style="width: 1200px; margin: 100px auto;" class="clearfix">
        <h1 id="h2transform">Contact US</h1>
        <form method="POST" action="contactForm.php" id="ContactForm" onsubmit="return formValidator()">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Name">
                        </td>
                        <td>
                            <input type="email" name="email" placeholder="Email">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="text" name="phone" onchange="ReplaceWord(this);" placeholder="Phone Number"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea placeholder="Message" name="message" rows="6"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ol id="errors">

                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <td><input id="submit_transform" type="submit" name="submit"></td>
                    </tr>
                </tbody>
            </table>
        </form>

        <div style="width: 40%;float: right; margin-left: 20px;" class="fb-page" data-href="https://www.facebook.com/Backtoschool-1627520684051833/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Backtoschool-1627520684051833/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Backtoschool-1627520684051833/">Backtoschool</a></blockquote></div>
    </div>
    <div id="InfoTable">
        <table cellpadding="25" cellspacing="5">
            <td class="baseCell">
                <table border="1" class="tablesUS">
                    <tr>
                        <td colspan="2"><img align="center" src="images/profile.png"></td>
                    </tr>
                    <tr>
                        <th>Name:<td>Azem</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Surname:<td>Ahmetxhekaj</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Email:<td class="email">azem.ahmetxhekaj1@gmail.com</td>
                        </th>
                    </tr>
                </table>
            </td>
            <td class="baseCell">
                <table border="1" class="tablesUS">
                    <tr>
                        <td colspan="2"><img align="center" src="images/profile.png"></td>
                    </tr>
                    <tr>
                        <th>Name:<td>Ditjon</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Surname:<td>Thaqi</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Email:<td>ditithaqi@gmail.com</td>
                        </th>
                    </tr>
                </table>
            </td>
            <td class="baseCell">
                <table border="1" class="tablesUS">
                    <tr>
                        <td colspan="2"><img align="center" src="images/profile.png"></td>
                    </tr>
                    <tr>
                        <th>Name:<td>Eltion</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Surname:<td>Musa</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Email:<td class="email">eltimusa4@gmail.com</td>
                        </th>
                    </tr>
                </table>
            </td>
            <td class="baseCell">
                <table border="1" class="tablesUS">
                    <tr>
                        <td colspan="2"><img align="center" src="images/profile.png"></td>
                    </tr>
                    <tr>
                        <th>Name:<td>Genci</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Surname:<td>Balaj</td>
                        </th>
                    </tr>
                    <tr>
                        <th>Email:<td class="email">gencibalaj@gmail.com</td>
                        </th>
                    </tr>
                </table>
            </td>
        </table>
    </div>
    <button style="position: fixed;right: 20px;bottom: 20px;" onclick="Location();">Where am I?</button>
    <script type="text/javascript">
        function Location() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(Position);
            }
        }

        function Position(position) {
            var latlon = position.coords.latitude + "," + position.coords.longitude;
            alert("Your coordinates are: " + latlon);
        }



        function formValidator() {
            var form = document.getElementById("ContactForm");
            var errorsOl = document.getElementById("errors");
            errorsOl.innerHTML = "";
            var name = form.querySelector("input[name='name']");
            var email = form.querySelector("input[name='email']");
            var phone = form.querySelector("input[name='phone']");
            var message = form.querySelector("textarea[name='message']");

            var inputs = [name, email, phone, message];
            var v = validePhoneNumber(phone, errorsOl);
            if (AreEmpty(inputs, errorsOl) || !v) {
                return false;
            }
        }
    </script>
    <?php include("footer.php"); ?>
</body>

</html>