<?php
 session_start();
If (isset ($_SESSION['transaction']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{$ $_SESSION['count']=0;
} else {
$_SESSION['count']++;
  $transaction = array();
  $transaction['type'] = $_POST['type'];
  $transaction['amount']=$_POST['amount'];
  $_SESSION['transactions'][]=$transaction;  
 print_r($_SESSION);
 echo $_SESSION['transaction'] . '<br>';
  
  $account=new account(100000);
  $account->debit(10000);
  $account->debit(20000);
  $account->debit(20000);
  $account->credit(30000);
  $account->credit(20001);
  $account->run();

  class account  {
  public $starting_balance;
  public $current_balance;
  public $transactions = array();
  }
  $transaction = array ("trans1","trans2","trans3","trans4","trans5");

 


  function __construct($amount)  {
 $this->starting_balance = $amount;
 $this->current_balance = $amount; 
 }
  function debit ($amount)  {
  $transaction = array();
  $transaction[amount] = ($amount);
  $transaction[type] = 'debit';
  
  $this->transactions[]=$transaction;


  function credit ($amount) {
  $transaction['amount'] = $amount; 
  $transaction['type'] = ('credit');
 $this->transactions[] = $transaction;
   }
 if($transaction['type'] == 'debit')  {
 $this->current_balance=$this->current_balance - $transaction['amount'];}
 else
 $this->current_balance=$this->current_balance + $transaction['amount'];
  } 




 'Request method: ' . $_SERVER["REQUEST_METHOD'];
 $form = '
 <FORM action = "aug12.php" method = "post">
 <fieldset>
 <LABEL for = "amount">Amount: </LABEL>
 <INPUT type = "text" name = "amount" <BR>
 <IINPUT type = "radio" name = "type" value = "debit"> Debit<BR>
 <INPUT type = "radio" name = "type" value = "credit"> Credit<BR>
 <INPUT type = "submit" value = "Send"> <INPUT type = "reset">
 </fieldset>
 </FORM>;
 echo ($FORM)
<?php print_r($_POST);?> 