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
      <title>Performances</title>
   </head>

   <body>

      <div class="container">
         <div class="header clearfix">
            <nav>
               <ul class="nav nav-pills pull-right">
                  <!-- I had to change line 1099 a{color} from #337AB7 to #fff to get white in the buttons -->
                  <li class="btn btn-primary"><a href="../index.php">View List</a></li>
                  <li role="presentation" class="btn btn-primary"><a href="songDetail.php">Song Details</a></li>

               </ul>
            </nav>
            <h3 class="text-muted">Performances</h3>
            <form method="post" action="currentBookings.php">
               <input type="text" name="perform">
               <input type="submit" value="search">
            </form> 
            <hr>
            <p>Enter the singer's number to see which songs they sing lead on.</p>
            <p>1 = Beverly&nbsp;&nbsp; 2 = Shannon&nbsp;&nbsp; 3 = Wendi&nbsp;&nbsp; 4 = All&nbsp;&nbsp;</p>
         </div>
         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th>Venue</th>
                     <th>Date</th>
                     <th>Time</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  //Get performances
                  $perform = $_POST['perform'];
                  $stmt = $db->prepare('SELECT * FROM performance JOIN venue ON performance.venue_id = venue.id WHERE venue_name=:id ORDER BY date');
                  $stmt->bindValue(':id', $perform, PDO::PARAM_STR);
                  $stmt->execute();
                  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rows as $r) {
                     echo '<tr><a href="display.php?performList=' . '<td>' . $r['id'] .'</td>' . '">';
                     echo '<td>' . $r['venue_name'] . '</td>';                     
                     echo '<td>' . $r['date'] . '</td>';
                     echo '<td>' . $r['time'] . '</td>';
                     echo '</a></tr>';
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






