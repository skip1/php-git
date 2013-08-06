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
  $toyota = 'bestcar';
  $notsure = &$toyota;
  $toyota = 'worstcar';
  echo $notsure;
  $cars = array($toyota, $chevy,$honda); 
  print_r ($cars);
// Notice that when I have an ampersand in front of toyota it passes by reference and only registers worstcar if no ampersand than it keeps original value
?>






