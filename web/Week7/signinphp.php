<?php

require 'dbConnect.php';
include 'regphp.php';


// Filter and store the data
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$password = checkPassword($password);

function checkPassword($password){
$db = get_db();
   $sql = 'SELECT username, password FROM users WHERE password = :password';
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':password', $password, PDO::PARAM_STR);
   $stmt->execute();
   $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
   $stmt->closeCursor();
   return $clientData;
}

      // Compare the password just submitted against
      // the hashed password for the matching client
      $hashCheck = password_verify($clientPassword, $clientData['password']);
      // If the hashes don't match create an error
      // and return to the login view
      if (!$hashCheck) {
         $message = '<p class="notice">Please check your password and try again.</p>';
         include 'welcome.php';
         exit;
      }