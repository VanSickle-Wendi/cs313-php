<?php

require 'dbConnect.php';
include 'regphp.php';


// Filter and store the data
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Get client data based on an email address
$db = get_db();
$sql = 'SELECT username, password FROM users WHERE username = :username';
$stmt = $db->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$hashed_password = $row['password'];



// Compare the password just submitted against
// the hashed password for the matching client
$hashCheck = password_verify($password, $hashed_password);
// If the hashes don't match create an error
// and return to the login view
if (!$hashCheck) {
   $message = '<p>Please check your password and try again.</p>';
   include 'signin.php';
   echo "What?";
   exit;
} else {
   header('Location: welcome.php');
}
