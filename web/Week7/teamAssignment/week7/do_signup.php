<?
session_start();
include("db_connect.php");
$db = get_db();

include("db_functions.php");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
$confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_STRING);


//$pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
$pattern = '/^(?=.*[[:digit:]])[[:print:]]{8,}$/';


if(!preg_match($pattern, $password)){
    $_SESSION['alert'] = "<div class='alert alert-success'>You must match the pattern.</div>";
    header("Location: signup.php");
    die();
} 


if($password == $confirmpassword){
    add_user($username, $password);

    $_SESSION['alert'] = "<div class='alert alert-success'>Yeah! You signed up. Now sign in.</div>";
    header("Location: signin.php");
    die();
} else {
    $_SESSION['alert'] = "<div class='alert alert-warning'>Your passwords did not match.</div>";
    $_SESSION['password_error'] = true;
    header("Location: signup.php");
    die();
}

?>