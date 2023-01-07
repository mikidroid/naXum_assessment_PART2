<?php
 //Database parameters
 $db_host = '127.0.0.1';
 $db_port = 3306;
 $db_pass = 'root';
 $db_user = 'root';
 $db_name = 'Naxum2';
 
 //Connection to the database
 $conn = new mysqli($db_host,$db_user,$db_pass,$db_name,$db_port);
 
 // Checking if any errors
 if ($conn->connect_errno) {
  echo $conn->connect_error;
  exit();
 }

?>