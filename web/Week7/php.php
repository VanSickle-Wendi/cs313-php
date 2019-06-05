<?php

require 'dbConnect.php';


// Filter and store the data
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

$checkPassword = checkPassword($password);


// Check for missing data
if (empty($username) || empty($password)) {
   $message = '<p>Please provide information for all empty form fields.</p>';
   include 'register.php';
   exit;
}

// Hash the checked password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Send the data to the model
$regOutcome = register($username, $password);

// Check and report the result
if ($regOutcome === 1) {
   setcookie('username', $username, strtotime('+1 year'), '/');
   $_SESSION['message'] = "<p>Thanks for registering $username. Please use your username and password to login.</p>";
   header('Location: signin.php?action=login');
   exit;
} else {
   $message = "<p>Sorry $username, but the registration failed. Please try again.</p>";
   include 'register.php';
   exit;
}


function register($username, $password) {
   // Create a conection object using the acme connection function
   $db = get_db();
   // The SQL statement
   $sql = 'INSERT INTO users (username, password)
           VALUES (:username, :password)';
   // Create the prepared statement using the db connection
   $stmt = $db->prepare($sql);
   // The next two lines replace the placeholders in the SQL
   // statement with the actual values in the variables
   // and tells the database the type of data it is
   $stmt->bindValue(':username', $username, PDO::PARAM_STR);
   $stmt->bindValue(':password', $password, PDO::PARAM_STR);
   // Insert the data
   $stmt->execute();
   // Ask how many rows changed as a result of our insert
   $rowsChanged = $stmt->rowCount();
   // Close the database interaction
   $stmt->closeCursor();
   // Return the indication of success (rows changed)
   return $rowsChanged;
}
