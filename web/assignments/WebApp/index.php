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

         <div>
            <form method="post" action="views/updateForm.php">

               <label for="song_num">Song #&nbsp;&nbsp;</label>
               <input type="text" name="song_num"  size="3" required>&nbsp;&nbsp;

               <label for="orig_artist">Original Artist&nbsp;&nbsp;</label>
               <input type="text" name="orig_artist" required>&nbsp;&nbsp;

               <label for="release_date">Date&nbsp;&nbsp;</label>
               <input type="date" name="release_date" required>&nbsp;&nbsp;

               <input type="submit" value="Update"><br><br><br>
            </form>

         </div>         

         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th class=tCenter class="col-sm-2">Song Number</th>
                     <th class="col-sm-4">Title</th>
                     <th class="col-sm-4">Original Artits</th>
                     <th class="col-sm-2">Release Date</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  //Get Songs
                  $statement = $db->prepare("SELECT id, title, orig_artist, release_date FROM song ORDER BY title");
                  $statement->execute();
                  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                     $id = $row['id'];
                     $title = $row['title'];
                     $artist = $row['orig_artist'];
                     $release = $row['release_date'];
                     echo "<tr><td class=tCenter>$id</td><td>$title</td><td>$artist</td><td>$release</td></tr>";
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
