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
      <title>Repertoire</title>
   </head>
   <body>
      <form method="post" action="index2.php">
         <input type="text" name="songs">
         <input type="submit" value="search">
      </form> 
    <?php
    $songs = $_POST['songs'];
    $stmt = $db->prepare('SELECT * FROM song WHERE lead_singer=:id');
    $stmt->bindValue(':id', $songs, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $r) {
        echo '<p><a href="display.php?songList=' . $r['id'] . '">';
        echo $r['title'] . ' ';
        echo $r['tempo'];
        echo ':' . $r['genre'];
        echo '</a></p>';
    }
    ?>      
      
   </body>
</html>