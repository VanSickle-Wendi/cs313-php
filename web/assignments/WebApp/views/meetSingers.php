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
            <p>Choose a singer to see what songs she sings lead on.</p> 
            <p>"All" means the song is full 3 part harmony or shared solos.</p>
            <li class="btn btn-primary btn-xs"><a href="singersInfo.php">More about the Singers</a></li>

         </div>

         <div>
            <?php
            $songs = $_POST["songs"];
            ?>
            <form method="post" action="meetSingers.php">
               <p>Sort by: &nbsp; &nbsp;
                  <input type="radio" name="songs" <?php if (isset($songs) && $songs == "All") echo "checked"; ?>value="All"> All &nbsp; &nbsp;            
                  <input type="radio" name="songs" <?php if (isset($songs) && $songs == "Beverly") echo "checked"; ?>value="Beverly"> Beverly &nbsp; &nbsp;
                  <input type="radio" name="songs" <?php if (isset($songs) && $songs == "Shannon") echo "checked"; ?>value="Shannon"> Shannon &nbsp; &nbsp;            
                  <input type="radio" name="songs" <?php if (isset($songs) && $songs == "Wendi") echo "checked"; ?>value="Wendi"> Wendi &nbsp; &nbsp;                  

                  <input type="submit" value="Submit"></p><br><br>
            </form>       
         </div>
       

         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th>Singer</th>
                     <th>Title</th>
                     <th>Tempo</th>
                     <th>Genre</th>
                     <th>Background</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  //Get Songs
                  $songs = $_POST['songs'];
                  $stmt = $db->prepare('SELECT * FROM song JOIN singer ON song.lead_singer = singer.id WHERE singer_name=:id ORDER BY title');
                  $stmt->bindValue(':id', $songs, PDO::PARAM_STR);
                  $stmt->execute();
                  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rows as $r) {
                     echo '<tr>';
                     echo '<td>' . $r['singer_name'] . '</td>';
                     echo '<td>' . $r['title'] . '</td>';
                     echo '<td>' . $r['tempo'] . '</td>';
                     echo '<td>' . $r['genre'] . '</td>';
                     echo '<td>' . $r['background'] . '</td>';
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





