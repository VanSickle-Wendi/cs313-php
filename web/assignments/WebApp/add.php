<?php 
include('database.php');
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

      <div class="container">
         <div class="header clearfix">
            <nav>
               <ul class="nav nav-pills pull-right">
                  <!-- I had to change line 1099 a{color} from #337AB7 to #fff to get white in the buttons -->
                  <li class="btn btn-primary"><a href="index.php">View List</a></li>
                  <li role="presentation" class="btn btn-primary"><a href="add.php">Add Song</a></li>

               </ul>
            </nav>
            <h3 class="text-muted">Suggest a Song</h3>
         </div>
         <div class="row">
            <form>
               <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="title">
               </div>
               <div class="form-group">
                  <label for="tempo">Tempo</label>
                  <select name="tempo" class="form-control" id="tempo">
                     <option value="0">Select Tempo</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="genre">Genre</label>
                  <select name="genre" class="form-control" id="genre">
                     <option value="0">Select Genre</option>
                  </select>
               </div>               
               <br>
               <button name="submit" type="submit" class="btn btn-default">Submit</button>
            </form>
            <br><br>
         </div>

         <footer class="footer">
            <p>&copy; 2019.</p>
         </footer>

      </div> <!-- /container -->


      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
   </body>
</html>


