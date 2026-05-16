<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze

require_once 'auth.php';
require_once 'dbconnect.php';

$query = "SELECT * FROM members ORDER BY member_id";
$result = $pdo->query($query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Members</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php include 'navbar.php'; ?>

<h1>Club Members</h1>

<p><a href="mainmenu.php">Back to Main Menu</a></p>

<p><a href="addMember.php">Add New Member</a></p>

<table>

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

<?php

while ($row = $result->fetch())
{
    $r0 = htmlspecialchars($row['member_id']);
    $r1 = htmlspecialchars($row['first_name']);
    $r2 = htmlspecialchars($row['last_name']);
    $r3 = htmlspecialchars($row['email']);
    $r4 = htmlspecialchars($row['major']);
    $r5 = htmlspecialchars($row['grad_year']);
    $r6 = htmlspecialchars($row['role']);
    $r7 = htmlspecialchars($row['attendance_count']);

    echo <<<_END

    <tr>

        <td>$r0</td>
        <td>$r1</td>
        <td>$r2</td>
        <td>$r3</td>
        <td>$r4</td>
        <td>$r5</td>
        <td>$r6</td>
        <td>$r7</td>

        <td>

            <a href="updateMember.php?id=$r0">Update</a>

            |

            <a href="deleteMember.php?id=$r0"
               onclick="return confirm('Are you sure you want to delete this member?');">
               Delete
            </a>

        </td>

    </tr>

_END;
}

?>

</table>

</div>

</body>
</html>