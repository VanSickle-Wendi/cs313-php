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

            
            <form method="post" action="regphp.php">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" required><br><br>
                  <label for="password" id="password">Password</label>
                  <span>Passwords must be at least 7 characters and contain at least 1 number.</span>
                  <input type="password" name="password" id="password" required pattern="(?=.*\d).{7,}$">     
                  <button  class="button" type="submit">Register</button>
            </form>
           
         </main>
         </footer>
      </div>   
   </body>
</html>

