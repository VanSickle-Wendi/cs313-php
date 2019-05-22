<!DOCTYPE html>

<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/> 
      <title>Week 5 Team Assignment</title>
   </head>
   <body>
      <div>
         <header>
            <h1>Scripture Resources</h1>
         </header>
         <main>


            <?php
            try {
               $dbUrl = getenv('DATABASE_URL');

               $dbOpts = parse_url($dbUrl);

               $dbHost = $dbOpts["host"];
               $dbPort = $dbOpts["port"];
               $dbUser = $dbOpts["user"];
               $dbPassword = $dbOpts["pass"];
               $dbName = ltrim($dbOpts["path"], '/');

               $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

               $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
               echo 'Error!: ' . $ex->getMessage();
               die();
            }
            ?>

            <?php
            foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row) {
               echo "<p><span>" . $row['book'] . ' ';
               echo $row['chapter'];
               echo ':' . $row['verse'] . ' - ' . "</span>";
               echo '"' . $row['content'] . '"' . "</p>";
               echo '<br/>';
            }
            ?>

            <ul>
               <form name="display" action="team.php" method="POST" >
                  <li>Book Name:</li><li><input type="text" name="bookName" /></li>
                  <li><input type="submit" name="submit" /></li>
               </form>
            </ul>            

            <footer>
            </footer>
      </div>   
   </body>
</html>

