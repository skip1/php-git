<?php
  $handle = fopen("example.csv", "r");
   while (! feof($handle))
   {
   
   print_r(fgetcsv($handle));  }
   fclose ($handle);
?>
