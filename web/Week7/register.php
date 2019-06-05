<?php

// Create or access a Session
session_start();

// Get the database connection file
require 'dbConnect.php';
$db = get_db();
?>

<!DOCTYPE html>
<!--
This is the registration page.
-->
<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <title>Registration</title>
   </head>
   <body>
      <div id="container">
         <header>
         </header>
         <main>
            <h1>Registration</h1>
            
            <?php
            if (isset($message)) {
               echo $message;
            }
            ?>
            
            <form method="post" action="php.php">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" <?php if(isset($username)){echo "value='$username'";} ?> required>
                  <label for="password" id="password">Password</label>
                  <span class="pFormRules">Passwords must be at least 7 characters and contain at least 1 number.</span>
                  <input type="password" name="password" id="password" required pattern="(?=.*\d).{7,}$">     
                  <button  class="button" type="submit">Register</button>
                  <!-- Add the action name - value pair -->
                  <input type="hidden" name="action" value="register">
            </form>
           
         </main>
         </footer>
      </div>   
   </body>
</html>

