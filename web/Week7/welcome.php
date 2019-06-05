<?php

// Create or access a Session
session_start();

// Get the database connection file
require 'dbConnect.php';
$db = get_db();



// Get the acme model for use as needed
require_once '../model/accounts-model.php';



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
   case 'login':
      include '../view/login.php';
      break;
   case 'registeration':
      include '../view/registration.php';
      break;

   case 'register':
      // Filter and store the data
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);

      // Check for existing email address in the table
      $existingEmail = checkExistingEmail($clientEmail);

      if ($existingEmail) {
         $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
         include '../view/login.php';
         exit;
      }

      // Check for missing data
      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
         $message = '<p class="formMessage">Please provide information for all empty form fields.</p>';
         include '../view/registration.php';
         exit;
      }

      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model
      $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

      // Check and report the result
      if ($regOutcome === 1) {
         setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
         $_SESSION['message'] = "<p class='formMessage'>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
         header('Location: /acme/accounts/?action=login');
         exit;
      } else {
         $message = "<p class='formMessage'>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
         include '../view/registration.php';
         exit;
      }
      break;


   case 'Login':
      // Filter and store the data
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);
      
      // Check for missing data
      if (empty($clientEmail) || empty($checkPassword)) {
         $message = '<p class="formMessage">Please provide information for all empty form fields.</p>';
         include '../view/login.php';
         exit;
      }

      // A valid password exists, proceed with the login process
      // Query the client data based on the email address
      $clientData = getClient($clientEmail);
      // Compare the password just submitted against
      // the hashed password for the matching client
      $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
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
      $_SESSION['message'] = "<p class='formMessage'>Welcome " .$_SESSION['clientData']['clientFirstname']."."."</p>";    
      // Send them to the admin view
      include '../view/admin.php';
      exit;
      break;
      
   case 'Logout':
      $_SESSION = array();
      session_destroy();
      header('Location: /acme/index.php');
      break;

// Get the session data 
   case 'updateAccountInfo':
      $clientId = $_SESSION['clientData']['clientId'];
      $clientInfo = getClientInfo($clientId);
      // verify that there are 
      if (count($clientInfo) < 1) {
         $message = 'Sorry, your information could not be found.';
      }
      include '../view/client-update.php';
      exit;
      break;

// Actual account update     
   case 'updateClient':
      // Filter and store the data
      $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
      $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
      $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

      // Check for existing email address in session and in the table
      if ($_SESSION['clientData']['clientEmail'] != $clientEmail) {
         if (checkExistingEmail($clientEmail)) {
            $message = '<p class="formMessage">That email address already exists. Please choose a different one.</p>';
            include '../view/client-update.php';
            exit;
         }
      }

      // Check for missing data
      if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
         $message = '<p class="formMessage">Please fill in all form fields.</p>';
         include '../view/client-update.php';
         exit;
      }

      // Send the data to the model
      $updateResult = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);

      // Check and report the result
      if ($updateResult) {
         $message = "<p class='formMessage'>Congratulations, your account was successfully updated.</p>";
         $_SESSION['message'] = $message;
         // Requery the database for updated info
         $_SESSION['clientData'] = getClientInfo($clientId);
         header('location: /acme/accounts/');
         exit;
      } else {
         $message = "<p class='formMessage'>Sorry. Your account was not updated. Please try again.</p>";
         include '../view/client-update.php';
         exit;
      }
      break;

// Change Password     
   case 'updatePassword':
      // Filter and store the data
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

      $checkPassword = checkPassword($clientPassword);

      // Check for missing data
      if (empty($checkPassword)) {
         $message = '<p class="formMessage">Please check your password and try again.</p>';
         include '../view/client-update.php';
         exit;
      }

      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model. To test, change $hashedPassword to $clientPassword. Remember to change it back.
      $updateResult = updatePassword($hashedPassword, $clientId);

      // Check and report the result
      if ($updateResult) {
         $message = "<p class='formMessage'>Congratulations, your password was successfully updated.</p>";
         $_SESSION['message'] = $message;
         header('location: /acme/accounts/');
         exit;
      } else {
         $message = "<p class='formMessage'>Sorry. Your password was not updated. Please try again.</p>";
         include '../view/client-update.php';
         exit;
      }
      break;

   case 'goToAdmin':
         header('location: /acme/accounts/');
         exit;
      break;

   default:
      include '../view/admin.php';
      break;
}



