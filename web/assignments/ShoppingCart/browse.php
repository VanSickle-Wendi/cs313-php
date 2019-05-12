<!DOCTYPE html>
<?php
// Start Session
session_start();

// Set session variables
//$_SESSION["carts"] 
//?>

<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      
      <title>Browse Products</title>
   </head>
   <body>
      <div id="container">
         <header>
            <h1>Wendi's Store</h1>
         </header>
         <nav>
         </nav>
         <main>
            <h1>Browse Products</h1>
      <form action="cart.php" method="post">
         <label for="canisters"><h2>Disney Canisters:</h2> <p id="limit">Limit Ten Items</p></label><br><br>
         <div class="row">
            <img src="img/Goofy.jpg">&nbsp;<input type="checkbox" name="canisters[]" value="Goofy">&nbsp;Goofy&nbsp;&nbsp;&nbsp;<br>         
         <img src="img/Mickey.jpg">&nbsp;<input type="checkbox" name="canisters[]" value="Mickey Mouse">&nbsp;Mickey Mouse&nbsp;&nbsp;&nbsp;<br>
         <img src="img/Minnie.jpg">&nbsp;<input type="checkbox" name="canisters[]" value="Minnie Mouse">&nbsp;Minnie Mouse&nbsp;&nbsp;&nbsp;<br>
         <img src="img/Donald.jpg">&nbsp;<input type="checkbox" name="canisters[]" value="Donald Duck">&nbsp;Donald Duck&nbsp;&nbsp;&nbsp;<br><br>
         </div><br><br>
          
         <input type="submit" name="submit" value="Submit" ><br><br>
      </form>
            <?php // print_r($_SESSION);?>
            
            <a href="cart.php">View Cart</a>
            

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



