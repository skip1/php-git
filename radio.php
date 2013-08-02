<?php
  class blueprint   {
  protected $myname;
  public $email;
  private $address;
  }
  class radio extends blueprint  {
  public $station = '105.9';
  
  function __construct()  {
  $this->myname = 'keith williams';
  $this->address = '58 clark ct';
  }
  }
  $keith = new radio;
  $keith->email = 'keith@webizly.com';
  //$keith->address = '58 clark ct';
  print_r ($keith);
?>
  

