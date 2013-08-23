<?php

  $form = '<FORM action = "bankprogram.php" method = "post">
   <p>
  <LABEL for "username">Username: </LABEL>
  <INPUT type = "text name="username" id = "username" <BR>
  <LABEL for "password"> Password: </LABEL>
  <INPUT type = "text" name = "password" id="password"><BR>
  <INPUT type="submit" value = "Send"> <INPUT type="reset">
  </P>
  </FORM>
';
  
  echo $form;


  $program = new program();

  class program {

  public function __construct() {

  if($_REQUEST == NULL) {

  $this->homepage();
  } elseif($_REQUEST['page'] == 'bankform') {

  if($_SERVER['REQUEST_METHOD'] == 'GET') {

  $this->bankform();
  }   else 
  $transactions = new transactions();
           if(array_key_exists('moretranstype', $_POST)) {

           $transactions->addTransaction($_POST['type'],$_POST['amount']);

           header('Location: http://www.mywebclass.org/gitexample/index.php?page=bankform');
         } else {

           $transactions->addTransaction($_POST['type'],$_POST['amount']);
           $transactions->printTransactions();
         } 
       }   
    }  




    

    function homepage() {
      
      echo 'hello welcome to my program <br>';
      echo '<a href="./bankprogram.php?page=bankform">Click to View Bank Form</a>';

    }

    function bankform() {

       $form = new debitcredit();

       $form->printform();    
    }

  }


  class transactions {

    public $transactions = array();
     public function __construct() {

         session_start();

     }

     public function addTransaction($type, $amount) {

       $transaction = new transaction();

       $transaction->setType($type);
       $transaction->setAmount($amount);
       

       $_SESSION['transactions'][] = $transaction;
     } 


    public function printTransactions() {
      foreach($_SESSION['transactions'] as $transaction) {
	$transaction->printTransaction();
      }
    }  
  
  }

  class transaction  {
    public $type;
    public $amount;
   

    public function setType($type) {
      $this->type = $type;
    } 
    public function setAmount($amount) {
      $this->amount = $amount;
    }
    
   
    public function getType() {
      return $this->type;
    }
    public function getAmount() {
      return $this->amount;
    }
    

    public function getTransaction() {
      $transaction = array();
      $transaction['type'] = $this->type;
      $transaction['amount'] = $this->amount;
      return $transaction;
    }


    public function printTransaction() {
      echo '<hr>'; 
      echo 'Transaction type: ' .   $this->type . "<br> \n";
      echo 'Transaction amount: ' . $this->amount . "<br> \n";
      

    }

  }
 

  class debitcredit {

    public function printform() {
      $form = '<br>
               <FORM action="bankprogram.php"?page=bankform" method="post">
                    <fieldset>
                    <LABEL for="amount">Amount: </LABEL>
                    <INPUT type="text" name="amount" id="lastname"><BR>
                    <INPUT type="text" name="source" id="lastname"><BR>
                    <INPUT type="radio" name="type" value="debit"> Debit<BR>
                    <INPUT type="radio" name="type" value="credit"> Credit<BR>
                    <INPUT type="checkbox" name="moretranstype" value="yes"> More Trans<BR>
                    <INPUT type="submit" value="Send"> <INPUT type="reset">
                </fieldset>
              </FORM>';

      echo $form;
   }
}             $transactions = new transactions();

$transactions->read_transactions();

       class file {
       public $file_name = 'example.csv';
       public function read_csv() {
       $first_run = TRUE;
       if (($handle = fopen($this->file_name, "r")) !== FALSE) {
       while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
       if($first_run == TRUE)    {
       $field_names = $this->create_field_names($data);
       $first_run = FALSE;
       } else {
       $records[] = $this->create_record($data, $field_names);
       }
          
     }
       fclose($handle);
       print_r($records);
        }
     }
       public function create_field_names($data) {

       return $data;        
     }
       public function create_record($data, $field_names) {
       $data = array_combine($field_names, $data);
       return $data;
        }


    }




        class transactions2 extends file {

        public $file_name = 'transactions2.csv';
                
        public function read_transactions() {
        $this->read_csv();
      }


    }

//in post method instantiate new transaction transactions will extend file o
//file class will manipulate csv file to read or write into a file
?>
