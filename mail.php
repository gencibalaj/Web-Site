<?php
    $from = "no-replay@backtoschool.edu";
    $to = $_POST["TO"];
    $link = urldecode($_POST["LINK"]);

    $subject = "Active Account";
    $message = "Follow the link below to active your account on BackToSchool \n\n" . $link;
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
?>