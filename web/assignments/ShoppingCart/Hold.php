
//Took this from cart page body
      <?php
      $canisters = "";     
      ?>
      
      <?php
      echo "<h2>Items in your cart:</h2>";
      foreach($_SESSION["canisters[]"] as $value) {
         echo "$value, ";
      }      
      echo $canisters;
      ?>

