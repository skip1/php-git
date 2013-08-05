<?php

  class cars    {
  public  $name = 'honda';
  public   $year = 2010;
  public   $type = 'sedan';
  public   $model = 'accord';

  }

  class toyota extends cars  {
  function __construct ()  {
  $this->name = 'toyota';
  $this->year = '2013';
  $this->type = 'sedan';
  $this->model = 'camry';
  }
  }

  class chevy extends cars   {
  function __construct()   {
  $this->name = 'chevy';
  $this->year = '2012';
  $this->type = 'coupe';
  $this->model = 'vault';
  }
  }
  
  $honda  = new cars;

  $toyota = new toyota;
  $chevy  = new chevy;
  print_r($toyota);
  print_r($chevy);
  print_r($honda);
  $chevy = &$honda;
 
// Notice that when I have an ampersand in front of nissan Honda keeps its o//riginal year 2010 and ignores line 37 $honda = $nissan. When I dont have a//ampersand in front I get an undefined variable in nissan. 
?>

