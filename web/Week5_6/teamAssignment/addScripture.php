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
      <form>
         <input type="text" name="book" id="book">
         <input type="text" name="chapter" id="chapter">
         <input type="text" name="verse" id="verse">
         <input type="textarea" name="content" id="content">

            <?php 
                $topic['fa'] = "Faith";
                $topic['sa'] = "Sacrifice";
                $topic['ch'] = "Charity";
                
                foreach($topic as $key => $value){
            ?>
                    <label><input type="checkbox" name="topic[]" value="<?php echo  $key; ?>"><?php echo $value;?></label><br>     
            <?php
                }
            ?>         
      </form>

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

