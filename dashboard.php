<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze

require_once 'auth.php';
require_once 'dbconnect.php';

$totalMembers = $pdo->query("SELECT COUNT(*) FROM members")->fetchColumn();

$avgAttendance = $pdo->query("
    SELECT ROUND(AVG(attendance_count), 1)
    FROM members
")->fetchColumn();

$totalLeadership = $pdo->query("
    SELECT COUNT(*)
    FROM members
    WHERE role != 'Member'
")->fetchColumn();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php include 'navbar.php'; ?>

<h1>Club Dashboard</h1>

<div class="card-container">

    <div class="card">
        <h2>Total Members</h2>
        <p><?php echo htmlspecialchars($totalMembers); ?></p>
    </div>

    <div class="card">
        <h2>Average Attendance</h2>
        <p><?php echo htmlspecialchars($avgAttendance); ?></p>
    </div>

    <div class="card">
        <h2>Leadership Members</h2>
        <p><?php echo htmlspecialchars($totalLeadership); ?></p>
    </div>

</div>

</div>

</body>
</html>