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
                <h1>Welcome <?=$_SESSION['user']['username'];?></h1>
                
                (<a href="signout.php">log out</a>)
            </div>
        </section>
    </body>
</html>