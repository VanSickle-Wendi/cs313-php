<!DOCTYPE html>

<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="cssTeam.css" type="text/css" rel="stylesheet" media="screen"/> 
      <title>Week 5 Team Assignment</title>
   </head>
   <body>
      <div>
         <header>
         </header>
         <main>
            <h1>Scripture Resources</h1>
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
            foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
            {
            echo "<span>" . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . ' - ' . "</span>" . '"' . $row['content'] . '"' . '<br/>';

            }            
            ?>
            
            <p><span id="bold">John 1:5 - "And the light shineth in darkness; and the darkness comprehended it not."</span><p>
         </main>
         <footer>
         </footer>
      </div>   
   </body>
</html>

