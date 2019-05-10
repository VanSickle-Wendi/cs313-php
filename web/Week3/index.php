<!DOCTYPE html>

<!-- Alternate Code -->
<?php
include_once 'php/_data.php';
?>
<html>
   <head>
      <style>
         label {
            display: block;
         }
         li {
            list-style: none;
         }
      </style>
   </head>
   <body>
      <!-- Hitting submit sends data (from the input 'name' variables) to post.php form and runs 
      through filter_input function-->
      
      <form method="post" action="php/post.php">
         <label for="name">Name:&nbsp<input type="text" name="name" id="name" /></label><br>
         <label>Email:&nbsp<input type="email" name="email" /></label><br>
         <label for="maj">Major:&nbsp</label>
         <?php foreach ($majors as $abbr => $major) : ?>
            <input id="maj" type="radio" name="major" value="<?= $abbr; ?>"/>
            <?= $major; ?><br>
         <?php endforeach; ?><br>
         <label for="com">Comments:&nbsp</label>
         <textarea id="com" name="comments" cols="30" rows="5"></textarea><br><br>        
         Visited Continents:
         <ul>
            <li>
               <?php foreach ($continents as $abbr => $name) : ?>
                  <label>
                     <input type="checkbox" name="visited[]" value="<?= $abbr; ?>"/>
                     <?= $name; ?>
                  </label>
               <?php endforeach; ?>
            </li>
         </ul>
         <div>
            <input type="submit" name="action" value="Submit"
         </div><br><br>
      </form>

<!--       <p><a href="../assignments/teamAssignments.php" title="Visit Team Assignments page">Return to Team Assignments</a></p>-->

   <!--</body>-->

<!--</html>-->

<!--- My Code -->
<!--<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Week 3 Form</title>
   </head>
   <body>-->
<!-- Hitting submit sends data to php.php form and runs through input_test function-->
      <form action="php/php.php" method="post">
         <label for="name">Name: &nbsp</label>
         <input type="text" name="name">

         <br><br>
         <label for="email">E-mail: </label>
         <input type="text" name="email"><br><br><br>

         <label for="major">Major: </label>
         <br><br>
         <input type="radio" name="major" value="Computer Science">Computer Science
         <input type="radio" name="major" value="Web Design and Development">Web Design and Development
         <input type="radio" name="major" value="Computer Information Technology">Computer Information Technology
         <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br><br><br>
         
         <label for="continents">Continents Visited: </label><br><br>
         <input type="checkbox" name="continents[]" value="North America">North America<br>
         <input type="checkbox" name="continents[]" value="South America">South America<br>
         <input type="checkbox" name="continents[]" value="Europe">Europe<br>
         <input type="checkbox" name="continents[]" value="Asia">Asia<br>
         <input type="checkbox" name="continents[]" value="Australia">Australia<br>
         <input type="checkbox" name="continents[]" value="Africa">Africa<br>
         <input type="checkbox" name="continents[]" value="Antarctica">Antarctica<br><br>

         <label for="name">Comments: </label>
         <br>
         <textarea name="comment" rows="5" cols="40"></textarea><br><br>
         <input type="submit">
      </form>

   </body>
</html>

