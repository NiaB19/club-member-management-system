<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze

require_once 'auth.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Menu</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<?php include 'navbar.php'; ?>

<h1>Main Menu</h1>

<p style="text-align:center;">
    Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!
</p>

</div>

</body>
</html>