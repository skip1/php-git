<?php
 $record = array ('first_name' => 'keith', 'last_name' => 'Williams');
  print_r($record) ;
  
  $records= array();
  $records[] = $record;
   $record['first_name'] = 'Noam';
  $record['last_name'] = 'Lustiger'; 
  $records[] = $record;
  print_r($records);
  $records[] = $record;
  $record['first_name']='steve';
  $record['last_name']='josephs';
  $record['middle_name'] = 'allison';
  $records[]=$record;
  print_r ($record);
  array_push($record, 'Shmuel Kipper');
  $fruits = array_pop($record);
  print_r($record);
  print_r($fruits);
//every name needs a new records[]=record to add a new person
?>
