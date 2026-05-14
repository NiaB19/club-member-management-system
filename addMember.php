<?php include 'navbar.php'; ?>
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze

require_once 'auth.php';
require_once 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $major = trim($_POST['major'] ?? '');
    $grad_year = trim($_POST['grad_year'] ?? '');
    $role = trim($_POST['role'] ?? '');
    $attendance_count = trim($_POST['attendance_count'] ?? '');

    $stmt = $pdo->prepare("
        INSERT INTO members
        (first_name, last_name, email, major, grad_year, role, attendance_count)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $first_name,
        $last_name,
        $email,
        $major,
        $grad_year,
        $role,
        $attendance_count
    ]);

    header("Location: listMembers.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Member</title>
</head>
<body>

<h1>Add Member</h1>

<p><a href="mainmenu.php">Back to Main Menu</a></p>

<form method="post">
    <input type="text" name="first_name" placeholder="First Name" required><br><br>
    <input type="text" name="last_name" placeholder="Last Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="major" placeholder="Major" required><br><br>
    <input type="number" name="grad_year" placeholder="Graduation Year" required><br><br>
    <input type="text" name="role" placeholder="Role" required><br><br>
    <input type="number" name="attendance_count" placeholder="Attendance Count" required><br><br>

    <button type="submit">Add Member</button>
</form>

</body>
</html>