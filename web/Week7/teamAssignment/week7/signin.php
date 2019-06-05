<?
session_start();
include("db_connect.php");
$db = get_db();

include("db_functions.php");
?>
<!doctype html>
<html>
    <head>
        <title>Sign In! Come on, everyone is doing it</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/week7.css">
    </head>
    <body>
        <section class="container">
            <div class="col-md-6 offset-md-3">
                <h1>Sign In!</h1>
                
                <? 
                if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                }
                ?>
                
                <p>(Not signed up yet? <a href="signup.php">Sign up here</a>)</p>
                
                <form action="do_signin.php" method="post">
                    <div>
                        <label for="form-username">Username</label>
                        <input type="text" class="form-control" id="form-username" name="username">
                    </div>
                    <div>
                        <label for="form-password">Password</label>
                        <input type="password" class="form-control" id="form-password" name="password">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Sign in">
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>