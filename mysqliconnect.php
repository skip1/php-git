<?php
//database connection properties
  $dbhost ="localhost";
  $dbuser = "sk";
  $dbpass = "sk";
  $dbname = "employees";
  $db = mysqli_connect($dbhost, $dbuser, $dbpass, dbname);
  /*if you want to connect through pdo type this:
   * $db = new PDO (mysql:host='.$dbhost.';dbname.'.$dbuser,$dbpass);
   */
  
  if(mysqli_connect_errno()) {
  	die("Database could not connect: " .
  	mysqli_connect_errno().
  	" (" .mysqli_connect_errno() .")"
   

?>

<!DOCTYPE html>
<html>
	<head>
		<title> Welcome to the employees database</title>
	</head>
	<body>
	       Please select an employee	
		
	</body>
	</head>
</html>
 