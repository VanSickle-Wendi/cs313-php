<?php
session_start();
include("db_connect.php");
$db = get_db();

include("db_functions.php");

if(isset($_SESSION['logged_in']) &&  $_SESSION['logged_in'] == true){
    include("welcome.php");
} else {
    header("Location: signin.php");
    die();
}
?>