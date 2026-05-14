<?php

require_once 'dblogin.php';

try {
    $pdo = new PDO($attr, $user, $pwd, $opts);
}
catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>