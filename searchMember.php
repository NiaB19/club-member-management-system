<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
//Lets users choose a search field from a dropdown and search the members table.

require_once 'auth.php';
require_once 'dbconnect.php';

$results = [];

$allowedFields = [
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'email' => 'Email',
    'major' => 'Major',
    'grad_year' => 'Graduation Year',
    'role' => 'Role'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $field = $_POST['field'] ?? '';
    $search = trim($_POST['search'] ?? '');

    if (array_key_exists($field, $allowedFields) && $search !== '') {

        $stmt = $pdo->prepare("SELECT * FROM members WHERE $field LIKE ?");

        $stmt->execute(['%' . $search . '%']);

        $results = $stmt->fetchAll();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Members</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php include 'navbar.php'; ?>

<h1>Search Members</h1>

<p><a href="mainmenu.php">Back to Main Menu</a></p>

<form method="post">

    <label>Choose field:</label>

    <select name="field" required>

        <?php foreach ($allowedFields as $value => $label): ?>

            <option value="<?php echo htmlentities($value); ?>">
                <?php echo htmlentities($label); ?>
            </option>

        <?php endforeach; ?>

    </select>

    <input type="text" name="search" placeholder="Enter search term" required>

    <button type="submit">Search</button>

</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <h2>Search Results</h2>

    <?php if (count($results) > 0): ?>

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
            </tr>

            <?php foreach ($results as $member): ?>

                <tr>
                    <td><?php echo htmlentities($member['member_id']); ?></td>
                    <td><?php echo htmlentities($member['first_name']); ?></td>
                    <td><?php echo htmlentities($member['last_name']); ?></td>
                    <td><?php echo htmlentities($member['email']); ?></td>
                    <td><?php echo htmlentities($member['major']); ?></td>
                    <td><?php echo htmlentities($member['grad_year']); ?></td>
                    <td><?php echo htmlentities($member['role']); ?></td>
                    <td><?php echo htmlentities($member['attendance_count']); ?></td>
                </tr>

            <?php endforeach; ?>

        </table>

    <?php else: ?>

        <p>No records found.</p>

    <?php endif; ?>

<?php endif; ?>

</div>

</body>
</html>