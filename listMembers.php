<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
//Lists all records from the members table in an HTML table.

require_once 'auth.php';
require_once 'dbconnect.php';

// Retrieve all members from database
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

// Display each member record in HTML table
while ($row = $result->fetch())
{

    // Sanitize output before displaying in browser
    $r0 = htmlentities($row['member_id']);
    $r1 = htmlentities($row['first_name']);
    $r2 = htmlentities($row['last_name']);
    $r3 = htmlentities($row['email']);
    $r4 = htmlentities($row['major']);
    $r5 = htmlentities($row['grad_year']);
    $r6 = htmlentities($row['role']);
    $r7 = htmlentities($row['attendance_count']);

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

            <form action="deleteMember.php"
                  method="post"
                  style="display:inline;">

                <input type="hidden"
                       name="member_id"
                       value="$r0">

                <input type="submit"
                       value="Delete"

                       onclick="return confirm('Are you sure you want to delete this member?');"

                       style="
                           background:none;
                           border:none;
                           color:#2563eb;
                           font-weight:bold;
                           cursor:pointer;
                           padding:0;
                           margin:0;
                           text-decoration:none;
                           font-size:inherit;
                           font-family:inherit;
                       ">

            </form>

        </td>

    </tr>

_END;
}

?>

</table>

</div>

</body>
</html>