<?php
require_once 'auth.php';
require_once 'dbconnect.php';

$id = $_GET['id'] ?? '';

if ($id === '') {
    echo "<p>No member selected.</p>";
    echo "<a href='listMembers.php'>Back to List Members</a>";
    exit();
}

$stmt = $pdo->prepare("DELETE FROM members WHERE member_id = ?");
$stmt->execute([$id]);

header("Location: listMembers.php");
exit();
?>