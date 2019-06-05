<?php

// Create or access a Session
session_start();

// Get the database connection file
require 'dbConnect.php';
$db = get_db();
?>

<!DOCTYPE html>
<!--
This is the signin page.
-->
<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <title>Sign in</title>
   </head>
   <body>
      <div id="container">
         <header>
         </header>
         <main>
            <h1>Sign in</h1>
            
            <?php
            if (isset($message)) {
               echo $message;
            }
            ?>
            
            <form method="post" action="signinphp.php">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" <?php if(isset($username)){echo "value='$username'";} ?> required>
                  <label for="password" id="password">Password</label>
                  <span>Passwords must be at least 7 characters and contain at least 1 number.</span>
                  <input type="password" name="password" id="password" required pattern="(?=.*\d).{7,}$">     
                  <button  class="button" type="submit">Register</button>
               <h2>Not registered?</h2>
               <div>
                  <a href="register.php">Create an Account</a>                  
            </form>
           
         </main>
         </footer>
      </div>   
   </body>
</html>
