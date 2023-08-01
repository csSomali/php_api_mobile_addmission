<?php 
$SERVER="localhost";
$user="root";
$db="proposal";
$password="";
 
$con=mysqli_connect($SERVER,$user,$password,$db);

if ($con->connect_errno) {
	 echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
} 





?>