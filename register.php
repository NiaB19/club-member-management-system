
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
require_once 'dbconnect.php';

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

$errors = [];

if (strlen($username) < 6) {
    $errors[] = "Username must be at least 6 characters.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be valid.";
}

if (strlen($password) < 8 ||
    !preg_match('/[a-z]/', $password) ||
    !preg_match('/[A-Z]/', $password) ||
    !preg_match('/[0-9]/', $password)) {
    $errors[] = "Password must be at least 8 characters and include uppercase, lowercase, and a number.";
}

if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    }
    echo "<a href='register.html'>Go back</a>";
    exit;
}

$check = $pdo->prepare("SELECT username FROM users WHERE username = ?");
$check->execute([$username]);

if ($check->rowCount() > 0) {
    echo "<p>Username already exists.</p>";
    echo "<a href='register.html'>Choose another username</a>";
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->execute([$username, $email, $hashedPassword]);

echo "<h2>Registration successful!</h2>";
echo "<a href='login.html'>Go to Login</a>";
?>