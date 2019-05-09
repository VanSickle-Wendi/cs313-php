<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <meta name ="author" content="Wendi Van Sickle">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Week 3 Form</title>
   </head>
   <body>

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

