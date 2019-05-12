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
      <title>Checkout</title>      
   </head>
   <body> 
      <h2>Please fill in your information: </h2>

      <form method="post" action="confirmation.php">
         <span class="pFormRules">All fields are required.</span><br>
         <label for="Firstname">First name: &nbsp;</label>
         <input type="text" name="Firstname" id="Firstname" <?php if (isset($Firstname)) {
   echo "value='$Firstname'";
   } ?> required><br>
         
         <label for="Lastname">Last name: &nbsp;</label>
         <input type="text" name="Lastname" id="Lastname" <?php if (isset($Lastname)) {
   echo "value='$Lastname'";
} ?> required><br>
         
         <label for="Email">Email Address: &nbsp;</label>
         <input type="email" name="Email" id="Email" <?php if (isset($Email)) {
   echo "value='$Email'";
} ?> required placeholder="Enter a valid email address"><br>
         
         <label for="Street">Street: &nbsp;</label>
         <input type="text" name="Street" id="Street" <?php if (isset($Street)) {
   echo "value='$Street'";
   } ?> required><br>
         
         <label for="City">City: &nbsp;</label>
         <input type="text" name="City" id="City" <?php if (isset($City)) {
   echo "value='$City'";
} ?> required><br>
         <label for="State">State: &nbsp;</label>
         <input type="text" name="State" id="State" <?php if (isset($State)) {
   echo "value='$State'";
   } ?> required><br>
         <label for="City">Zip Code: &nbsp;</label>
         <input type="text" name="ZipCode" id="ZipCode" <?php if (isset($ZipCode)) {
   echo "value='$ZipCode'";
   } ?> required><br><br>         

         <button  class="button" type="submit">Checkout</button><br><br>
         <!-- Add the action name - value pair -->
<!--         <input type="hidden" name="action" value="register">-->
      </form>        




      <a href="browse.php">Browse</a><br><br>
      <a href="cart.php">View Cart</a>             
   </body>
</html>