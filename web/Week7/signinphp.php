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
echo $hashed_password;



