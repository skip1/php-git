<?php
  $obj = new program;
   
  class program {
function __construct() {
if(isset($_REQUEST['page'])) {
$page = $_REQUEST['page'];
echo '<center><H2>Weclome to our bank!</H2></center>';
$obj = new $page();
} else {
$obj = new homepage;
}
}
  }

  class page {
public function __construct() {
if($_SERVER['REQUEST_METHOD'] == 'GET') {
$this->get();
} else {
$this->post();
}
}
protected function get() {
echo 'form';
}
protected function post() {
echo 'process form';
echo '<center>thank you for posting your information</center>';
echo '<center><a href="bankform2.php?page=homepage">Click here to go back to the homepage.</a></center>';
}
  }

  class homepage extends page{
protected function get() {
echo "<center><H1>Welcome to our bank!</H1></center>";
echo "<center><H2>We have no money!</H2></center>";
echo '<center><a href="bankform2.php?page=logInForm">If you have an account, click here!</a>';
echo '<center><a href="bankform2.php?page=newUserForm">If you do not have an account yet, find out what youre missing!</a>';
    }
  }

class newUserForm extends page {
public function get() {
echo $_REQUEST;
echo '<FORM action="bankform2.php?page=addNewUser" method="post">
<fieldset>
<LABEL for="username">Pick your Username: </LABEL>
<INPUT type="text" name="username" id="username"><BR>
<LABEL for="password">Pick Your Password: </LABEL>
<INPUT type="password" name ="password" id="password"><BR>
<LABEL for="password_confirm">Confirm Your Password: </LABEL>
<INPUT type="password" name ="password_confirmation" id="password_confirm"><BR>
<LABEL for="first_name">First Name: </LABEL>
<INPUT type="text" name="first_name" id="first_name"><BR>
<LABEL for="last_name">Last Name: </LABEL>
<INPUT type="text" name="last_name" id="last_name"><BR>
<LABEL for="email_address">Email Address: </LABEL>
<INPUT type="text" name="email_address" id="email"><BR>
<INPUT type="submit" value="Send"> <INPUT type="reset">
</fieldset>
</FORM>';
}

  }
  class logInForm extends page{
public function get() {
echo $_REQUEST;
echo '<FORM action="bankform2.php?page=authenticate" method="post">
<fieldset>
<LABEL for="username">Username: </LABEL>
<INPUT type="text" name="username" id="username"><BR>
<LABEL for="password">Password: </LABEL>
<INPUT type="password" name ="password" id="password"><BR>
<INPUT type="submit" value="Send"> <INPUT type="reset">
</fieldset>
</FORM>';
}
  }   
    class transactionForm extends page{
      public function get() {
        echo '<FORM action="index.php?page=bankform" method = "post">
<fieldset>
<LABEL for="amount">Amount: </LABEL>
<INPUT type="text" name="amount" id="lastname"><BR>
<INPUT type="radio" name="type" value="debit"> Debit<BR>
<INPUT type="radio" name="type" value="credit"> Credit<BR>
<INPUT type="checkbox" name="moretranstype" value="yes"> More Trans<BR>
<INPUT type="submit" value="Send"> <INPUT type="reset">
</fieldset>
</FORM>';
      }
    }
   abstract class fileData extends page{
   public function writeFile($file, $array, $type) {
    $fp=fopen($file, $type);
      fputcsv($fp,$array,',');
      fclose($fp);
    }
    
      public function readFile($file, $type) {
        $user_data = array();
        $user_keys = array('username', 'first_name', 'last_name', 'email_address', 'password', 'account_number');
     $row = 1;
      if (($handle = fopen($file, $type)) !== FALSE) {
     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
     $users["$row"] = array_combine($user_keys, $data);
     $row++;
     } fclose($handle);
      } return $user_data;
    }
  }
  class user {

public $username;
public $first_name;
public $last_name;
public $account_number;
public $password;
public $email_address;

   public function setValues() {
       $this->username = $_POST['username'];
        $this->first_name = $_POST['first_name'];
        $this->last_name = $_POST['last_name'];
        $this->password = $_POST['password'];
        $this->email_address = $_POST['email_address'];
        $this->newUser = array();
        $this->newUser= array($this->username, $this->first_name, $this->last_name, $this->email_address, $this->password);
        return $this->newUser;
    }
     public function setAccountNumber() {
      $account = $this->setValues();
      $this->account_number = rand(100000, 999999);
      $account[] = $this->account_number;
      return $account;
     }	
     public function welcomeUser() {
      echo "<center><H2>Hi,$this->first_name!</H2> <br> <pre>Your account number is $this->account_number</pre></center>";
       	   echo '<center><a href="bankform2.php?page=transactionForm">Click here to add or remove money.</a></center>';
		   echo '<center><a href= "bankform2.php?page=addNewUser">Click here to open another account.</a></center>';
        echo '<center><FORM action="bankform2.php?page=transactionForm" method="post">
<fieldset>
<LABEL for="starting balance">enter your starting balance here. $</LABEL>
<INPUT type="text" name="starting_balance" id="starting balance"><BR>
<INPUT type="submit" value="Send"> <INPUT type="reset">
</fieldset>
</FORM></center>';

     }
  }
     
  class authenticate extends fileData {
      public $user_data;
      public $data;
   public function post() {
      $this->user_data = $this->readFile('user_data','r');
      $this->find_username();
      $this->welcome_user();	
    }
    protected function find_username() {
     $num = 1;
      while(isset($this->user_data["$num"]) && $num < 100) {
            $a = $this->user_data["$num"];
          if(in_array($_POST['username'], $a, true) && (in_array($_POST['password'], $a, true))) {
     $this->data = $a;
          } $num ++;
      }
    }
    protected function welcome_user() {
    if(isset($this->data)) {
          echo "<center><H3><br>Welcome back " . $this->data['first_name'] . '!</H3>' . '<br><pre><b>Account Number ' . $this->data['account_number'] . '</b></pre></center>';
          echo '<center><a href="bankform2.php?page=transactionForm">Click here to add or remove money.</a></center>';
          echo '<center><a href="bankform2.php?page=transactionForm">Click here to change your information.</a></center>';
      } else {
       echo '</b></pre>Wrong username or password.</b></pre>';
      }
    }
  }
 
  
  
    class addNewUser extends fileData{
  
   public function __construct() {
   $test1 = $this->checkPassword();
   $test2 = $this->errorCheck();
      if($test1 > 1 && $test2 > 1) {
   $obj = new user();
   $user = $obj->setAccountNumber();	
   $obj->welcomeUser();
   //print_r($user);
   $this->writeFile('user_data.csv', $user, 'a');
   }
   }  
    public function checkPassword() {
     try{
     if($_POST['password'] != $_POST['password_confirmation']) {
     throw new Exception("Wrong Password! <br>");
     }
     } catch(Exception $e) {
     echo $e->getMessage();
     }
	  if(isset($e)) {
     $test = 1;	
        echo '<a href="bankform.php?page=newUserForm">Click here to re-enter your information.</a>';
        } else {
         $test = 2;
        }
          return $test;}
    
      public function errorCheck() {
      foreach ($_POST as $key=>$value) {
     $key2 = str_replace('_', ' ', $key);
     $key3 = ucfirst($key2);
     try{
     if($value == NULL) {
     throw new Exception("Please enter your $key3.<br>");
     }
     } catch(Exception $e) {
     echo $e->getMessage();
     }
       } if(isset($e)) {
     $test = 1;	
        echo '<a href="bankform2.php?page=newUserForm">Click here to re-enter your information.</a>';
         } else {
          $test = 2;
         }
         return $test;
    }
  }

?>