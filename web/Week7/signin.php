<?php
// Create or access a Session
session_start();

// Get the database connection file
require 'dbConnect.php';
$db = get_db();

$loginFailed = false;

if (isset($_POST['username']) && isset($_POST['password'])) {

   $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
   $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

   $db = get_db();
   $sql = 'SELECT password FROM users WHERE username = :username';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':username', $username, PDO::PARAM_STR);
   $result = $stmt->execute();
   if ($result) {

      $row = $stmt->fetch();
      $hashed_password_from_db = $row['password'];

         if (password_verify($password, $hashed_password_from_db)) {

            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            die();

         }else {
         $loginFailed = true;
         }
   }else {
      $loginFailed = true;
   }
}


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
            <?php
            if ($loginFailed) {
               echo "Incorrect username or password!<br><br>\n";
            }
            ?>
            <h1>Sign in</h1>

            <?php
            if (isset($message)) {
               echo $message;
            }
            ?>

            <form method="post" action="signin.php">
               <label for="username">Username</label>
               <input type="text" name="username" id="username" required>
               <label for="password" id="password">Password</label>
               <span>Passwords must be at least 7 characters and contain at least 1 number.</span>
               <input type="password" name="password" id="password" required pattern="(?=.*\d).{7,}$">     
               <button  class="button" type="submit">Sign In</button>
               <h2>Not registered?</h2>
               <div>
                  <a href="register.php">Create an Account</a>                  
            </form>

         </main>
      </footer>
   </div>   
</body>
</html>
