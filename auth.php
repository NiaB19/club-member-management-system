
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>