<!DOCTYPE html>

<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen"/> 
      <script src="javascript/javascript.js"></script>
      <title>Week 5 Team Assignment</title>
   </head>
   <body>
      <div>
         <header>
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
            foreach ($db->query('SELECT username, password FROM note_user') as $row)
            {
            echo 'user: ' . $row['username'];
            echo ' password: ' . $row['password'];
            echo '<br/>';
            }            
            ?>
         </main>
         <footer>
         </footer>
      </div>   
   </body>
</html>

