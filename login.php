
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
// Checkks username and passowrd, verifies password, starts the session, // Shows the login form

session_start();

require_once 'dbconnect.php';//require once to prevent duplicate disk and to show an error if file not found CH Build and executing query

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Retrieve user from database by username
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);

$user = $stmt->fetch();

// Verify entered password against hashed password
if ($user && password_verify($password, $user['password'])) {

    $_SESSION['username'] = $username;

    header("Location: mainmenu.php");
    exit();

} else {

    echo "<p>Invalid username or password.</p>";
    echo "<a href='login.html'>Try Again</a>";
}

?>