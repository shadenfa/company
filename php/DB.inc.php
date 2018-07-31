<?php  
   $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_DATABASE = 'company';
    
  $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD,$DB_DATABASE);
  if(!$con) {
    die('Failed to connect to server: ' . mysqli_error());
  }
  ?>