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
      <title>Repertoire</title>
   </head>

   <body>

      <div class="container">
         <div class="header clearfix">
            <nav>
               <ul class="nav nav-pills pull-right">
                  <!-- I had to change line 1099 a{color} from #337AB7 to #fff to get white in the buttons -->
                  <li class="btn btn-primary"><a href="index.php">View List</a></li>
                  <li role="presentation" class="btn btn-primary"><a href="views/add.php">Add Song</a></li>

               </ul>
            </nav>
            <h3 class="text-muted">Repertoire</h3>
         </div>
         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th>Title</th>
<!--                     <th>Tempo</th>
                     <th>Genre</th>
                     <th>Background</th>-->
                     <th>Get Song Info</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  //Get Songs
                  $statement = $db->prepare("SELECT title, tempo, genre, background FROM song ORDER BY title");
                  $statement->execute();
                  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                     $title = $row['title'];
//                     $tempo = $row['tempo'];
//                     $genre = $row['genre'];
//                     $background = $row['background'];

                     echo "<tr>";
                     echo "<td>$title</td>";
                     echo "<td>";
                     echo "<a href='views/songDetails.php?id=' . <?php echo $row[id]; ?>' class='btn btn-default btn-xs'>Details</a>";
                     echo "</td>";
                     echo "</tr>";
//                     echo "<tr><td>$title</td><td>$tempo</td><td>$genre</td><td>$background</td></tr>";                     
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
