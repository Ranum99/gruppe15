<?php
   include('cookiemonster.php');

   if(checkCookies(3)) {
       include("config.php");
       include("db.php");

       if($_SERVER["REQUEST_METHOD"] == "POST") {
          // username and password sent from form
          $brukerID = mysqli_real_escape_string($db,$_POST['brukerID']);

          $sql = "UPDATE foreleser SET godkjentAvAdmin = 1 WHERE idBruker = $brukerID";
          $result = mysqli_query($db,$sql);
          echo "Bruker godkjent";
       }
   } else {
       delCookies("emailCookie");
       delCookies("passwordCookie");
       header("Location: ../html/index.html");
   }
?>