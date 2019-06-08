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
            <p>Choose a singer to see what part she sings, her favorite song, and what experience she has.</p> 
         </div>

         <div>
            <?php
            $info = $_POST["info"];
            ?>
            <form method="post" action="singerInfo.php">
               <p>Sort by: &nbsp; &nbsp;
                  <input type="radio" name="info" <?php if (isset($info) && $info == "All") echo "checked"; ?>value="All"> All &nbsp; &nbsp;            
                  <input type="radio" name="info" <?php if (isset($info) && $info == "Beverly") echo "checked"; ?>value="Beverly"> Beverly &nbsp; &nbsp;
                  <input type="radio" name="info" <?php if (isset($info) && $info == "Shannon") echo "checked"; ?>value="Shannon"> Shannon &nbsp; &nbsp;            
                  <input type="radio" name="info" <?php if (isset($info) && $info == "Wendi") echo "checked"; ?>value="Wendi"> Wendi &nbsp; &nbsp;                  

                  <input type="submit" value="Submit">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<button class="btn btn-primary btn-xs"><a href="singerInfo.php">Who sing lead on which songs.</a></button></p><br><br>
            </form>       
         </div>         

         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th class="col-sm-1">Singer</th>
                     <th class="col-sm-1">Part</th>
                     <th class="col-sm-1">Favorite Song</th>
                     <th class="col-sm-3">Experience</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  //Get Info
                  $info = $_POST['info'];
                  $stmt = $db->prepare('SELECT singer_name, part, fav_song, experience FROM singer WHERE singer_name=:id');   
                  $stmt->bindValue(':id', $info, PDO::PARAM_STR);                  
                  $stmt->execute();
                  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rows as $r) {
                     echo '<tr>';
                     echo '<td>' . $r['singer_name'] . '</td>';
                     echo '<td>' . $r['part'] . '</td>';
                     echo '<td>' . $r['fav_song'] . '</td>';                     
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






