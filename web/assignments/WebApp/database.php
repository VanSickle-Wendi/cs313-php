      <?php
      function get_db() {
         $db = NULL;
      //Connecting to a database at Heroku
      try {
         //Heroku automatically creates an enviroment variable DATABASE_URL
         //for the admin Postgre user and password, along with the hostname and
         //port of the database instance.
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
         die('Could not connect' . pg_last_error());
      }
      return $db;
      }
      ?>

