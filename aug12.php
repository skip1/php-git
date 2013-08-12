<?php
 // session_start();
 //if (isset($_SESSION[]) && $_SESSION['REQUEST_METHOD'] == 'POST') {
 //$_SESSION['count'] = 0;
 //} else {
 //$_SESSION['count'] ++;
 
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
  private $transactions = array();
  
  

 


  public function __construct($amount)  {
 $this->starting_balance = $amount;
 $this->current_balance = $amount; 
 }
   public function debit ($amount)  {
  $transaction = array();
  $transaction[amount] = ($amount);
  $transaction[type] = 'debit';
  
  $this->transactions[]=$transaction;
}

   public function credit ($amount) {
  $transaction['amount'] = $amount; 
  $transaction['type'] = ('credit');
  $this->transactions[] = $transaction;
   }

  public function process()  {
  echo 'type |  amount <br>';
  foreach ($this->transactions as $transaction)  {
  echo ($transaction['type']. ' | ' .  $transaction ['amount'] . '<br>';
 if($transaction['type'] == 'debit')  {
 $this->current_balance=$this->current_balance - $transaction['amount'];}
 else {
 $this->current_balance=$this->current_balance + $transaction['amount'];
  }}} 
 echo $current_balance;
 print_r $transaction
 print_r $current_balance


 'Request method: ' . $_SERVER["REQUEST_METHOD'];
 $form = '
 <form action = "aug12.php" method = "post">
 <fieldset>
 <LABEL for = "amount">Amount: </LABEL>
 <INPUT type = "text" name = "amount" <BR>
 <INPUT type = "radio" name = "type" value = "debit"> Debit<BR>
 <INPUT type = "radio" name = "type" value = "credit"> Credit<BR>
 <INPUT type = "submit" value = "Send"> <INPUT type = "reset">
 </fieldset>
 </form>;
 echo ($FORM)
<?php print_r($_POST);?> 
