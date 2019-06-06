<?php

// Create or access a Session
session_start();
if (isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
}else {
   header("Location: signin.php");
   die();
}
?>
<!DOCTYPE html>

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
            <h1>Welcome <?= $username ?></h1>
            
            <a href="signout.php">Sign Out</a>

           
         </main>
         </footer>
      </div>   
   </body>
</html>
