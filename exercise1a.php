<?php
//start class
  class account { 
  public $starting_balance;
  public $current_balance;

  public function __construct($amount) {
  $this->starting_balance =$amount;
  $this->current_balance =$amount; }
  public function debit($amount)  {
  $this->current_balance = $this->current_balance - $amount;
 }
  public function credit($amount)  {
  $this->current_balance = $this->current_balance + $amount;
 }
  public function __destruct()  {
  echo 'Your starting balance was: ' . $this->starting_balance . '<br>';
  echo 'Your ending balance is: '. $this->current_balance . '<br>';  
  }
  }
  //class ends on line 18
  //INSTANTIATE the class with $obj

 $obj = new account(1000);
 $obj->debit(100);
 $obj->credit(200);
 $obj->debit(500);

 //obj_>creates amount of account

//all this has to be done outside the class.Notice how there is no dollar si//gn b//by starting balance this is because this not a variable but a proper//ty because// its not in the class in class will be variable outside class //will be propert

  print_r($obj);

 //METHODS inside class called methods outside class called functions
 //functions also have public private protected etc.  
//functions dont need semicolon
//this refers to the class this is always in class 
//try to keep everything in class if possible-function construct etc
//you can put parameter in constructor
//only use return when you need to take a value from inside a function and b//ring it out if you need product for another function for ex.
   //$transaction = $obj->debit(100);
   //return $amount;
  ?>
