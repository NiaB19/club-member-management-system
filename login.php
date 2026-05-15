
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
session_start();

require_once 'dbconnect.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);

$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['username'] = $username;

    header("Location: mainmenu.php");
    exit();

} else {

    echo "<p>Invalid username or password.</p>";
    echo "<a href='login.html'>Try Again</a>";
}

?>