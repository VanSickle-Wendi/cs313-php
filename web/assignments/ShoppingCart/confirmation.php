<!DOCTYPE html>
<?php
// Start Session
session_start();
?>

<html>
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      
      <title>Confirmation</title>      
   </head>
   <body> 
      <?php
      $Firstname = $Lastname = $Email = $Street = $City = $State = $ZipCode = "";
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $Firstname = test_input($_POST["Firstname"]);
         $Lastname = test_input($_POST["Lastname"]);
         $Email = test_input($_POST["Email"]);
         $Street = test_input($_POST["Street"]);
         $City = test_input($_POST["City"]);
         $State = test_input($_POST["State"]);
         $ZipCode = test_input($_POST["ZipCode"]);
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
      echo $Firstname;
      echo "<br>";
      echo $Lastname;
      echo "<br>";      
      echo $Email;
      echo "<br>";
      echo $Street;
      echo "<br>";
      echo $City;
      echo "<br>";      
      echo $State;
      echo "<br>";
      echo $ZipCode;
      echo "<br>";      
      ?>      

      <h2>You purchased: </h2>
      
      
         <?php
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[0])){
              echo "<p class='con'>" ."The " . $value[0] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[1])){
              echo "<p class='con'>" ."The " . $value[1] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[2])){
              echo "<p class='con'>" ."The " . $value[2] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[3])){
              echo "<p class='con'>" ."The " . $value[3] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[4])){
              echo "<p class='con'>" ."The " . $value[4] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[5])){
              echo "<p class='con'>" ."The " . $value[5] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[6])){
              echo "<p class='con'>" ."The " . $value[6] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[7])){
              echo "<p class='con'>" ."The " . $value[7] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[8])){
              echo "<p class='con'>" ."The " . $value[8] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[9])){
              echo "<p class='con'>" ."The " . $value[9] . " " . "canister" . "</p><br><br>";
              }
           }
           ?>


      <a href="browse.php">Browse</a><br><br>
      <a href="cart.php">View Cart</a><br><br
      <a href="checkout.php">Checkout</a>      
   </body>
</html>
