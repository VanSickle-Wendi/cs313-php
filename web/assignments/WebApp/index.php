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
      <title>Mom and Double Image | Home</title>
   </head>

   <body>

      <div class="container">
         <div class="header clearfix">
            <nav>
               <?php include $_SERVER['DOCUMENT_ROOT'] . '/assignments/WebApp/common/navIndex.php'; ?>
            </nav>
            <h3 class="text-muted">Mom and Double Image</h3>
         </div>
         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th class=tCenter class="col-sm-1">Song Number</th>
                     <th class="col-sm-3">Title</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  //Get Songs
                  $statement = $db->prepare("SELECT id, title, tempo, genre, background FROM song ORDER BY title");
                  $statement->execute();
                  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                     $id = $row['id'];
                     $title = $row['title'];
                     echo "<tr><td class=tCenter>$id</td><td>$title</td></tr>";
                  }
                  ?>

               </tbody>
            </table>
         </div>

         <footer class="footer">
            <p>&copy; 2019.</p>
         </footer>

      </div> <!-- /container -->


      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
   </body>
</html>
