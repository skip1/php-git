<?php
  $handle = fopen("example.csv", "r");
   print_r(fgetcsv($handle));
   fclose ($handle);
?>
