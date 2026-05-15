
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
require_once 'auth.php';
require_once 'dbconnect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php
$stmt = $pdo->query("SELECT * FROM members ORDER BY member_id");
$members = $stmt->fetchAll();
?>

<?php include 'navbar.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Members</title>
</head>
<body>

<h1>Club Members</h1>

<p><a href="mainmenu.php">Back to Main Menu</a></p>
<p><a href="addMember.php">Add New Member</a></p>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Major</th>
        <th>Grad Year</th>
        <th>Role</th>
        <th>Attendance</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($members as $member): ?>
        <tr>
            <td><?php echo htmlspecialchars($member['member_id']); ?></td>
            <td><?php echo htmlspecialchars($member['first_name']); ?></td>
            <td><?php echo htmlspecialchars($member['last_name']); ?></td>
            <td><?php echo htmlspecialchars($member['email']); ?></td>
            <td><?php echo htmlspecialchars($member['major']); ?></td>
            <td><?php echo htmlspecialchars($member['grad_year']); ?></td>
            <td><?php echo htmlspecialchars($member['role']); ?></td>
            <td><?php echo htmlspecialchars($member['attendance_count']); ?></td>
            <td>
                <a href="updateMember.php?id=<?php echo urlencode($member['member_id']); ?>">Update</a> |
                <a href="deleteMember.php?id=<?php echo urlencode($member['member_id']); ?>"
                   onclick="return confirm('Are you sure you want to delete this member?');">
                   Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>

</body>
</html>