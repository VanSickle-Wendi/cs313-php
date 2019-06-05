<?
session_start();
include("db_connect.php");
$db = get_db();

include("db_functions.php");

$password_class = "";
if(isset($_SESSION['password_error'])){
    $password_class = "password-error";
}
?>
<!doctype html>
<html>
    <head>
        <title>Sign Up! Come on, everyone is doing it</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/week7.css">
    </head>
    <body>
        <section class="container">
            <div class="col-md-6 offset-md-3">
                <h1>Sign Up!</h1>
                
                <? 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
                ?>
                
                <form id="signupform" action="do_signup.php" method="post">
                    <div>
                        <label for="form-username">Username</label>
                        <input type="text" class="form-control" id="form-username" name="username">
                    </div>
                    <div>
                        <label for="form-password" class="<?=$password_class;?>">Password (at least 7 characters and at least one number)</label>
                        <input type="password" class="form-control" id="form-password" name="password" required pattern="(?=.*\d).{7,}$">
                    </div>
                    <div>
                        <label for="form-confirmpassword" class="<?=$password_class;?>">Confirm Password</label>
                        <input type="password" class="form-control" id="form-confirmpassword" name="confirmpassword">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Sign up">
                    </div>
                </form>
            </div>
        </section>
        
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){
            alert("hello js");
            $("#signupform").on("submit",function(event){
                event.preventDefault();
                if($("#form-password").val() == $("#form-confirmpassword").val()){
                    return true;
                } else {
                    alert("passwords did not match");
                    return false;
                }
            });               
        });
        </script>
    </body>
</html>
<?
if(isset($_SESSION['password_error'])){
    unset($_SESSION['password_error']);
}
?>