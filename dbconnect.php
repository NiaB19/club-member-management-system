<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
//using dblogin to create the actual PDO database connection.
 
require_once 'dblogin.php';

try {
    // Create PDO connection to MySQL database
    $pdo = new PDO($attr, $user, $pwd, $opts);
}
catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());//from book 368

}

?>