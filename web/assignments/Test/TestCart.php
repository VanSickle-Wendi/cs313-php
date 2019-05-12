<!DOCTYPE html>
<?php
// Start Session
session_start();

?>



<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/styles.css" type="text/css" rel="stylesheet" media="screen"/>  
      <title>Test Cart</title>
   </head>
   <body>
      <h5>Hello <?php echo $username;?></h5> 
   </body>
</html>

<?php
  if(isset($_POST['username'])) {
     header('LOCATION: TestBrowse.php');
  }
 ?>