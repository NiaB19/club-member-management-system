<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
//Shows the main navigation page after login.

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
    Welcome, <?php echo htmlentities($_SESSION['username']); ?>!
</p>

</div>

</body>
</html>