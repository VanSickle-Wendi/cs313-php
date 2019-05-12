<!DOCTYPE html>
<?php
// Start Session
session_start();



?>

<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/styles.css" type="text/css" rel="stylesheet" media="screen"/>  
      <title>Browse Products</title>
   </head>
   <body>
      <?php
      $username = $_SESSION['username'];
      echo $username;
      ?>
      <div id="container">
         <header>
            <h1>Wendi's Store</h1>
         </header>
         <nav>
         </nav>
         <main>
            <h1>Browse Products</h1>
      <form action="TestCart.php" method="post">
         <label for="username">User Name:</label>
          <input type="text" name="username"><br><br>
         <input type="submit" name="submit" value="Submit"><br><br>
      </form>
            
            
            <a href="TestCart.php">View Cart</a>
         </main>
         <footer>
            <div>
               <hr>
               <p>&copy; All rights reserved.</p>
               <p>All images used are believed to be in "Fair Use".</p>
            </div>            
         </footer>
      </div>   
   </body>
</html>

