<?php
require 'dbConnect.php';
$db = get_db();
?>


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
+
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
