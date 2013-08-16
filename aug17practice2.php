<?php
 $row =1;
 if (($shnitzel = fopen("example.csv" , "r")) !==FALSE)  {
 while (($record = fgetcsv($shnitzel, 0, ",")) !==FALSE)  {
 if ($row =1)  {
 $key = $record;
  $row++;
  print_r ($record);
  } else {
  $records = array_combine ($keys, $records);
  }
  }
  fclose ($shnitzel);
  }
  print_r ($records);


?>
