<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
require_once 'dblogin.php';

try {
    $pdo = new PDO($attr, $user, $pwd, $opts);
}
catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>