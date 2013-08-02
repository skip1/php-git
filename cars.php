<?php

  class cars    {
  private  $name;
  public   $year;
  public   $type;
  public   $model;

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
  $toyota = new toyota;
  $chevy  = new chevy;
  print_r($toyota);
  print_r($chevy);

?>

