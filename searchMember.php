
<?php include 'navbar.php';
 // I certify that this submission is my own original work.
 // Nia Bardavelidze
 ?>
 <!doctype html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">

     <link rel="stylesheet" href="style.css">
 </head>
 <body>
<?php
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
</head>
<body>

<h1>Search Members</h1>

<p><a href="mainmenu.php">Back to Main Menu</a></p>

<form method="post">
    <label>Choose field:</label>
    <select name="field" required>
        <?php foreach ($allowedFields as $value => $label): ?>
            <option value="<?php echo htmlspecialchars($value); ?>">
                <?php echo htmlspecialchars($label); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <input type="text" name="search" placeholder="Enter search term" required>

    <button type="submit">Search</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <h2>Search Results</h2>

    <?php if (count($results) > 0): ?>
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
            </tr>

            <?php foreach ($results as $member): ?>
                <tr>
                    <td><?php echo htmlspecialchars($member['member_id']); ?></td>
                    <td><?php echo htmlspecialchars($member['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($member['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($member['email']); ?></td>
                    <td><?php echo htmlspecialchars($member['major']); ?></td>
                    <td><?php echo htmlspecialchars($member['grad_year']); ?></td>
                    <td><?php echo htmlspecialchars($member['role']); ?></td>
                    <td><?php echo htmlspecialchars($member['attendance_count']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No records found.</p>
    <?php endif; ?>

<?php endif; ?>

</body>
</html>