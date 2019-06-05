<?php

require 'dbConnect.php';


// Filter and store the data
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


// Compare the password just submitted against
// the hashed password for the matching client
$hashCheck = password_verify($password, $clientData['clientPassword']);
// If the hashes don't match create an error
// and return to the login view
if (!$hashCheck) {
   $message = '<p class="notice">Please check your password and try again.</p>';
   include '../view/login.php';
   exit;
}

// A valid user exists, log them in
$_SESSION['loggedin'] = TRUE;
setcookie('firstname', '', strtotime('-1 year'), '/');
// Remove the password from the array
// the array_pop function removes the last
// element from an array
array_pop($clientData);
// Store the array into the session
$_SESSION['clientData'] = $clientData;
$_SESSION['message'] = "<p class='formMessage'>Welcome " . $_SESSION['clientData']['clientFirstname'] . "." . "</p>";
// Send them to the admin view
include '../view/admin.php';
exit;
break;

