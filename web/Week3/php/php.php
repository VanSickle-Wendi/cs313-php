<!DOCTYPE HTML>  
<html>
   <head>
   </head>
   <body> 
      <?php

      $name = $email = $major = $continents = $comment = "";
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $name = test_input($_POST["name"]);
         $email = test_input($_POST["email"]);
         $major = test_input($_POST["major"]);
         $continents = test_input($_POST["continents"]);
         $comment = test_input($_POST["comment"]);
      }
      
      
      function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
      }
      ?>
      
      <?php
      echo "<h2>Your Input:</h2>";
      echo $name;
      echo "<br>";
      echo $email;
      echo "<br>";
      echo $major;
      echo "<br>";
      echo "You have been to ";
      foreach($_POST["continents"] as $value) {
         echo "$value, ";
      }      
      echo $continents;
      echo "<br>";
      echo $comment;
      ?>

   </body>
</html>

