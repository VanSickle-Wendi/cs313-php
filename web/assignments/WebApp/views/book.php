<?php
require "../db/database.php";
$db = get_db();
// Start Session
session_start();

$date = htmlspecialchars($_POST['date']);
$time = htmlspecialchars($_POST['time']);
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
               <?php include $_SERVER['DOCUMENT_ROOT'] . '/assignments/WebApp/common/nav.php'; ?>
            </nav>
            <h3 class="text-muted">Book the Singers</h3>
         </div>

         <div>
            <form method="post" action="book.php">

               <label for="date">Date mm/dd/yyyy&nbsp;&nbsp;</label>
               <input type="date" name="date" required>&nbsp;&nbsp;

               <label for="time">Time 00:00&nbsp;&nbsp;</label>
               <input type="time" name="time" required>&nbsp;&nbsp;
               
               <label for="venue">Venue&nbsp;&nbsp;</label>
               <input type="number" name="venue" required>&nbsp;&nbsp;  
               
               <label for="booked">Booked&nbsp;&nbsp;</label>
               <input type="text" name="booked" required>&nbsp;&nbsp;                 

               <input type="submit" value="Book Singers"><br><br><br>
            </form>

         </div>         


         <div class="row">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                     <th>Performance ID</th>
                     <th>Date</th>
                     <th>Time</th>
                     <th>Venue</th>
                     <th>Booked</th>
                  </tr>
               </thead>
               <tbody>

                  <?php
                  //Get Performances
                  $statement = $db->prepare("SELECT id, date, time, venue_id, booked FROM performances");
                  $statement->execute();
                  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                     $id = $row['id'];
                     $date = $row['date'];
                     $time = $row['time'];
                     $venue_id = $row['venue_id'];
                     $booked = $row['booked'];

                     echo "<tr>";
                     echo "<td>$id</td><td>$date</td><td>$time</td><td>$venue</td><td>$booked</td></tr>";
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












<html>
   <head>
      <title>Week 6 Team Assignment</title>  
      <meta charset="UTF-8">
      <meta name="viewport" >
      <link rel="stylesheet" type="text/css" href="scriptures.css"> 
   </head>
   <body>
      <header>
         <h1>Add Scripture and Topic</h1>

      </header>


      <div>
         <form method="post" action="newScripture.php">

            <label for="add_book">Add a book</label>
            <input type="text" name="add_book">

            <label for="add_chapter">Add a chapter</label>
            <input type="text" name="add_chapter">

            <label for="add_verse">Add a verse</label>
            <input type="text" name="add_verse">

            <label for="add_content">Add content</label>
            <textarea rows="6" cols="50" name="add_content"></textarea>
            <br>

            <?php
            $stmt = $db->query('SELECT * FROM topic');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->execute();

            foreach ($results as $row) {
               ?>
               <!--    < ? =      is short for     < ? php echo I added spaces so it would not see it as code --> 
               <input type="checkbox" name="topics[]" value="<?= $row['id']; ?>"> <?= $row['name']; ?>
               <?php
            }
            ?>
            <input type="checkbox" name="newTopic" value="true">
            <input type="text" name="newTopic_text">

            <input type="submit" value="Add Scripture">
         </form>

      </div>
      <?php
      $stmt = $db->prepare('SELECT * FROM scriptures');
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row) {
         echo "<p><span>" . $row['book'] . ' ';
         echo $row['chapter'];
         echo ':' . $row['verse'] . ' - ' . "</span>";
         echo '"' . $row['content'] . '"' . "</p>";
         echo '<br/>';

         $scriptureid = $row['id'];

         $stmt2 = $db->prepare('SELECT topic.name FROM topic
        LEFT JOIN scriptures_topic
        ON scriptures_topic.topic_id = topic.id
        WHERE scriptures_topic.scriptures_id = :scriptureid');
         $stmt2->bindValue(':scriptureid', $scriptureid, PDO::PARAM_INT);
         $stmt2->execute();
         $topics = $stmt2->fetchAll(PDO::FETCH_ASSOC);
         foreach ($topics as $t) {
            echo $t['name'];
            echo '<br>';
         }
      }
      ?>
      <div>


      </div>


   </body>
</html>