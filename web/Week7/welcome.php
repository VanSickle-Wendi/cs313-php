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
    
      <title>Welcome</title>
   </head>
   <body>
      <div id="container">
         <header>
         </header>
         <main>
            <h1>Welcome</h1>
            
            <?php
            if (isset($message)) {
               echo $message;
            }
            ?>
            
Hi there!
           
         </main>
         </footer>
      </div>   
   </body>
</html>
