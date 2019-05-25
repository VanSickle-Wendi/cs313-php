<?php
require "db/database.php";
$db = get_db();
//include('database.php');
?>

<!DOCTYPE html>
<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">      
      <meta name="viewport" content="width=device-width, initial-scale=1.0">      
      <meta name ="author" content="Wendi Van Sickle">
      <link href="css2/bootstrap.css" rel="stylesheet">      
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/>
      <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/jumbotron-narrow/">
      <script src="javascript/javascript.js"></script>
      <title>Song Details</title>
   </head>

   <body>



      <?php
      $s_details = $_GET['id'];
      $stmt = $db->prepare('SELECT * FROM song WHERE id=:id');
      $stmt->bindValue(':id', $s_details, PDO::PARAM_STR);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      echo $row['title'];
      echo "<p><span>" . $row['book'] . ' ';
      echo $row['chapter'];
      echo ':' . $row['verse'] . ' - ' . "</span>";
      echo '"' . $row['content'] . '"' . "</p>";
      echo '<br/>';
      ?>

      <footer class="footer">
         <p>&copy; 2019.</p>
      </footer>

   </div> <!-- /container -->


   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
