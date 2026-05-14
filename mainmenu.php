<li><a href="dashboard.php">Dashboard</a></li>
<?php
require_once 'auth.php';
?>
<?php include 'navbar.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Menu</title>
</head>
<body>

<h1>Main Menu</h1>

<p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>

<ul>
    <li><a href="listMembers.php">List Records</a></li>
    <li><a href="addMember.php">Add Records</a></li>
    <li><a href="searchMember.php">Search Records</a></li>
    <li><a href="listMembers.php">Update Records</a></li>
    <li><a href="listMembers.php">Delete Records</a></li>
    <li><a href="logout.php">Log Out</a></li>
</ul>

</body>
</html>