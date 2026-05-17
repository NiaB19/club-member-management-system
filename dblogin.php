
<?php // dblogin.php
// I certify that this submission is my own original work.
// Nia Bardavelidze
//File proveded by professor. 
// Contains database connection parameters for PDO connection in dbconnect.php
  $host = 'localhost';    
  $database = 'bcs350sp26'; 
  $user = 'usersp26';         
  $pwd = 'pwdsp26';        
  $chrs = 'utf8mb4';
  $attr = "mysql:host=$host;dbname=$database;charset=$chrs";
  $opts =
  [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
?>
