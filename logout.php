
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
// 
session_start();

session_unset();
session_destroy();

header("Location: login.html");
exit();
?>