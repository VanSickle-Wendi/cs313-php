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
      <title>Song Details</title>
   </head>

   <body>

      <div class="container">
         <div class="header clearfix">
            <nav>
               <?php include $_SERVER['DOCUMENT_ROOT'] . '/assignments/WebApp/common/nav.php'; ?>
            </nav>
            <h3 class="text-muted">Song Details</h3>
            <hr>            
         </div>
         <div>
            <?php
            $sort = $_POST["sort"];
            ?>
            <form method="post" action="songDetail.php">
               <p>Sort by: &nbsp; &nbsp;
                  <input type="radio" name="sort" <?php if (isset($sort) && $sort == "title") echo "checked"; ?>value="title"> Title &nbsp; &nbsp;            
                  <input type="radio" name="sort" <?php if (isset($sort) && $sort == "tempo") echo "checked"; ?>value="tempo"> Tempo &nbsp; &nbsp;
                  <input type="radio" name="sort" <?php if (isset($sort) && $sort == "genre") echo "checked"; ?>value="genre"> Genre &nbsp; &nbsp;            
                  <input type="radio" name="sort" <?php if (isset($sort) && $sort == "background") echo "checked"; ?>value="background"> Background &nbsp; &nbsp;                  

                  <input type="submit" value="Submit"></p>
            </form>

         </div>
         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <?php
                     if (isset($sort) && $sort === "title") {
                        echo "<th>Title*</th><th>Tempo</th><th>Genre</th><th>Background</th>";
                     } elseif (isset($sort) && $sort === "tempo") {
                        echo "<th>Title</th><th>Tempo*</th><th>Genre</th><th>Background</th>";
                     } elseif (isset($sort) && $sort === "genre") {
                        echo "<th>Title</th><th>Tempo</th><th>Genre*</th><th>Background</th>";
                     } elseif (isset($sort) && $sort === "background") {
                        echo "<th>Title</th><th>Tempo</th><th>Genre</th><th>Background*</th>";
                     } else {
                        echo "<th>Title*</th><th>Tempo</th><th>Genre</th><th>Background</th>";
                     }
                     ?>                    
                  </tr>
               </thead>
               <tbody>

                  <?php
                  //Get Songs
                  if (isset($sort) && $sort === "title") {
                     $statement = $db->prepare("SELECT title, tempo, genre, background FROM song ORDER BY title");
                     $statement->execute();
                     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $title = $row['title'];
                        $tempo = $row['tempo'];
                        $genre = $row['genre'];
                        $background = $row['background'];

                        echo "<tr><td>$title</td><td>$tempo</td><td>$genre</td><td>$background</td></tr>";
                     }
                  } elseif (isset($sort) && $sort === "tempo") {
                     $statement = $db->prepare("SELECT title, tempo, genre, background FROM song ORDER BY tempo");
                     $statement->execute();
                     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $title = $row['title'];
                        $tempo = $row['tempo'];
                        $genre = $row['genre'];
                        $background = $row['background'];

                        echo "<tr><td>$title</td><td>$tempo</td><td>$genre</td><td>$background</td></tr>";
                     }
                  } elseif (isset($sort) && $sort === "genre") {
                     $statement = $db->prepare("SELECT title, tempo, genre, background FROM song ORDER BY genre");
                     $statement->execute();
                     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $title = $row['title'];
                        $tempo = $row['tempo'];
                        $genre = $row['genre'];
                        $background = $row['background'];

                        echo "<tr><td>$title</td><td>$tempo</td><td>$genre</td><td>$background</td></tr>";
                     }
                  } elseif (isset($sort) && $sort === "background") {
                     $statement = $db->prepare("SELECT title, tempo, genre, background FROM song ORDER BY background");
                     $statement->execute();
                     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $title = $row['title'];
                        $tempo = $row['tempo'];
                        $genre = $row['genre'];
                        $background = $row['background'];

                        echo "<tr><td>$title</td><td>$tempo</td><td>$genre</td><td>$background</td></tr>";
                     }
                  } else {
                     $statement = $db->prepare("SELECT title, tempo, genre, background FROM song ORDER BY title");
                     $statement->execute();
                     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $title = $row['title'];
                        $tempo = $row['tempo'];
                        $genre = $row['genre'];
                        $background = $row['background'];

                        echo "<tr><td>$title</td><td>$tempo</td><td>$genre</td><td>$background</td></tr>";
                     }
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

