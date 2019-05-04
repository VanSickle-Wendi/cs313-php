<!DOCTYPE html>

<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/> 
      <script src="javascript/javascript.js"></script>
      <title>My Home Page</title>
   </head>
   <body>
      <div>
         <header class="header">
            <?php include ('common/header.php'); ?>
         </header>
         <nav>
            <div class='nav'>
               <p><a href="index.php" title="Visit home page">Home</a></p>
               <p><a href="assignments/ComingSoon.php" title="Visit Assignments page">Assignments</a></p>
            </div> 
         </nav>
         <main>
            <div class="main--information">
               <h2>Hobbies</h2>
               <button onclick="hobbies()" class='btn'>What do you think I like to do?</button>
               <p id="hobbies"></p>
            </div>
            
            <div class="main--information">
               <h2>Family</h2>
               <button onclick="family()" class='btn'>Want to hear about my family?</button>
               <p id="family"></p>
            </div>
            
            <div class="main--information">
               <h2>School</h2>
               <button onclick="school()" class='btn'>What degree am I trying to get?</button>
               <p id="school"></p>
            </div>

            <div class="main--information">
               <h2>Beliefs</h2>
               <button onclick="beliefs()" class='btn'>This is why I'm happy.</button>
               <p id="beliefs"></p>
            </div>
                     
         </main>
         <footer>
            <?php include ('common/footer.php'); ?>
         </footer>
      </div>   
   </body>
</html>