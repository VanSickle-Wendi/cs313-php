<!DOCTYPE html>
<?php
// Start Session
session_start();
if(isset($_POST['submit'])){
   $_SESSION['carts'][] = $_POST['canisters'];
   header('LOCATION: browse.php');      
}


?> 
<html>
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      
      <title>Cart</title>      
   </head>
   <body> 
      <h2>You purchased: </h2>
      
      
         <?php
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[0])){
              echo "<p class='purchase'>" ."The " . $value[0] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[1])){
              echo "<p class='purchase'>" ."The " . $value[1] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[2])){
              echo "<p class='purchase'>" ."The " . $value[2] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[3])){
              echo "<p class='purchase'>" ."The " . $value[3] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[4])){
              echo "<p class='purchase'>" ."The " . $value[4] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[5])){
              echo "<p class='purchase'>" ."The " . $value[5] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[6])){
              echo "<p class='purchase'>" ."The " . $value[6] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[7])){
              echo "<p class='purchase'>" ."The " . $value[7] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[8])){
              echo "<p class='purchase'>" ."The " . $value[8] . " " . "canister" . "</p><br><br>";
              }
           }
           foreach($_SESSION['carts'] as $key =>$value) {
              If(isset($value[9])){
              echo "<p class='purchase'>" ."The " . $value[9] . " " . "canister" . "</p><br><br>";
              }
           }           
//              echo "The " . $value[1] . " " . "canister <br><br>";
//              echo "The " . $value[2] . " " . "canister <br><br>";
//              echo "The " . $value[3] . " " . "canister <br><br>"; 
             
//              var_dump($value);
//              print_r($value);
//              echo "$value";
          
      ?>
      
      <a href="browse.php">Browse</a><br><br>
            <a href="checkout.php">Checkout</a>            
   </body>
</html>

