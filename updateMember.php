<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
//Loads a selected member into a form and updates that member’s record.


require_once 'auth.php';
require_once 'dbconnect.php';

$id = $_GET['id'] ?? $_POST['member_id'] ?? '';

if ($id === '') {
    echo "<p>No member selected.</p>";
    echo "<a href='listMembers.php'>Go to List Members</a>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $major = trim($_POST['major']);
    $grad_year = trim($_POST['grad_year']);
    $role = trim($_POST['role']);
    $attendance_count = trim($_POST['attendance_count']);

    $stmt = $pdo->prepare("
        UPDATE members
        SET first_name = ?, last_name = ?, email = ?, major = ?, grad_year = ?, role = ?, attendance_count = ?
        WHERE member_id = ?
    ");

    $stmt->execute([
        $first_name,
        $last_name,
        $email,
        $major,
        $grad_year,
        $role,
        $attendance_count,
        $id
    ]);

    header("Location: listMembers.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM members WHERE member_id = ?");
$stmt->execute([$id]);
$member = $stmt->fetch();

if (!$member) {
    echo "<p>Member not found.</p>";
    echo "<a href='listMembers.php'>Go to List Members</a>";
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Update Member</h1>

<p><a href="mainmenu.php">Back to Main Menu</a></p>
<p><a href="listMembers.php">Back to List Members</a></p>

<form method="post">
    <input type="hidden" name="member_id" value="<?php echo htmlentities($member['member_id']); ?>">

    <input type="text" name="first_name" value="<?php echo htmlentities($member['first_name']); ?>" required><br><br>
    <input type="text" name="last_name" value="<?php echo htmlentities($member['last_name']); ?>" required><br><br>
    <input type="email" name="email" value="<?php echo htmlentities($member['email']); ?>" required><br><br>
    <input type="text" name="major" value="<?php echo htmlentities($member['major']); ?>" required><br><br>
    <input type="number" name="grad_year" value="<?php echo htmlentities($member['grad_year']); ?>" required><br><br>
    <input type="text" name="role" value="<?php echo htmlentities($member['role']); ?>" required><br><br>
    <input type="number" name="attendance_count" value="<?php echo htmlentities($member['attendance_count']); ?>" required><br><br>

    <button type="submit">Update Member</button>
</form>

</div>

</body>
</html>