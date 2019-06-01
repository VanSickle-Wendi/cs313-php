<?php
require "../db/database.php";
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
      <link href="../css2/bootstrap.css" rel="stylesheet">      
      <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen"/>
      <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/jumbotron-narrow/">
      <script src="javascript/javascript.js"></script>
      <title>Suggest a Song</title>
   </head>

   <body>

      <div class="container">
         <div class="header clearfix">
            <nav>
               <ul class="nav nav-pills pull-right">
                  <!-- I had to change line 1099 a{color} from #337AB7 to #fff to get white in the buttons -->
                  <li class="btn btn-primary btn-xs"><a href="../index.php">View List</a></li>
                  <li role="presentation" class="btn btn-primary btn-xs"><a href="songDetail.php">Song Details</a></li>
                  <li role="presentation" class="btn btn-primary btn-xs"><a href="meetSingers.php">The Singers</a></li>
                  <li role="presentation" class="btn btn-primary btn-xs"><a href="currentBookings.php">Performances</a></li>
                  <li role="presentation" class="btn btn-primary btn-xs"><a href="suggestSong.php">Suggest Song</a></li>
               </ul>
            </nav>
            <h3 class="text-muted">Suggest a Song</h3>
         </div>

         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th>Title</th>
                     <th>Artist</th>                    
                  </tr>
               </thead>
               <tbody>

                  <?php
                  //Get Songs
                     $statement = $db->prepare("SELECT title, artist FROM songSuggest");
                     $statement->execute();
                     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $title = $row['title'];
                        $artist = $row['artist'];

                        echo "<tr><td>$title</td><td>$artist</td></tr>";
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