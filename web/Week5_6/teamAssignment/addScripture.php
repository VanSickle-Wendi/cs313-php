<?php
require('dbConnect.php');
$db = get_db();
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Week06 Team Activity</title>
      <link rel="stylesheet" type="text/css" href="team05.css">
   </head>
   <body>
      <header>
         <h1>Add Scripture</h1>
      </header>
      <form method="post" action="list.php">
         <input type="text" name="book" id="book"><br><br>
         <input type="text" name="chapter" id="chapter"><br><br>
         <input type="text" name="verse" id="verse"><br><br>
         <input type="textarea" name="content" id="content"><br><br>



         <?php
         //Get topics
         $statement = $db->prepare("SELECT name FROM topic");
         $statement->execute();
         while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['name'];
            ?>
            <label><input type="radio" name="topic" value="<?php echo $name; ?>"><?php echo $name; ?></label><br><br>            <?php
         }
         
         $statement = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content)VALUES ('MMM', 67, 72, 'The darkness comprehended it not." . "INSERT INTO topic ");
         $statement->execute();
         ?>   

         <input type="submit" value="Add Scripture">
      </form>


INSERT INTO note_user (username, password) VALUES ('john', 'pass');

INSERT INTO scriptures (book, chapter, verse, content) 
   VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');




























      <?php
      foreach ($db->query('SELECT * FROM scriptures') as $row) {
         echo "<p><span>" . $row['book'] . ' ';
         echo $row['chapter'];
         echo ':' . $row['verse'] . ' - ' . "</span>";
         echo '"' . $row['content'] . '"' . "</p>";
         echo '<br/>';
      }
      ?>
      <form method="post" action="stretch05.php">
         <input type="text" name="book" placeholder="book">
         <input type="submit" value="search">
      </form>
   </body>
</html>

