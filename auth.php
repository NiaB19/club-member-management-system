
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
//Checks if user is logged in by verifying session variable, redirects to login page if not logged in. Included at the top of pages that require authentication.
session_start();

// Redirect users who are not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>