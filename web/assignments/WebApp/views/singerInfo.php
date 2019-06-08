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
      <title>Singers</title>
   </head>

   <body>

      <div class="container">
         <div class="header clearfix">
            <nav>
               <ul class="nav nav-pills pull-right">
                  <li class="btn btn-primary btn-xs"><a href="../index.php">View List</a></li>
                  <li class="btn btn-primary btn-xs"><a href="songDetail.php">Song Details</a></li>
                  <li class="btn btn-primary btn-xs"><a href="meetSingers.php">The Singers</a></li>
                  <li class="btn btn-primary btn-xs"><a href="currentBookings.php">Performances</a></li>
                  <li class="btn btn-primary btn-xs"><a href="suggestSong.php">Suggest a Song</a></li>                  
               </ul>
            </nav>
            <h3 class="text-muted">The Singers</h3>
            <hr>

         </div>
         

         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th>Singer</th>
                     <th>Part</th>
                     <th>Experience</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  //Get Info
                  $info = $_POST['info'];
                  $stmt = $db->prepare('SELECT singer_name, part, experience FROM singer');          
                  $stmt->execute();
                  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rows as $r) {
                     echo '<tr>';
                     echo '<td>' . $r['singer_name'] . '</td>';
                     echo '<td>' . $r['part'] . '</td>';
                     echo '<td>' . $r['experience'] . '</td>';
                     echo '</tr>';
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






