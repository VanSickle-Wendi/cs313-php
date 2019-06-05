<?php
// Create or access a Session
session_start();

require 'dbConnect.php';


// Filter and store the data
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$db = get_db();
// The SQL statement
$sql = 'INSERT INTO users (username, password)
           VALUES (:username, :hashed_password)';
// Create the prepared statement using the db connection
$stmt = $db->prepare($sql);
// The next two lines replace the placeholders in the SQL
// statement with the actual values in the variables
// and tells the database the type of data it is
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':hashed_password', $hashed_password, PDO::PARAM_STR);
// Insert the data
$stmt->execute();
header('Location: signin.php');
