
<?php
// I certify that this submission is my own original work.
// Nia Bardavelidze
require_once 'dbconnect.php';

try {

    $pdo->exec("DROP TABLE IF EXISTS members");
    $pdo->exec("DROP TABLE IF EXISTS users");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users(
            username VARCHAR(50) PRIMARY KEY,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS members(
            member_id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            major VARCHAR(100) NOT NULL,
            grad_year INT NOT NULL,
            role VARCHAR(50) NOT NULL,
            attendance_count INT DEFAULT 0
        )
    ");

    $stmt = $pdo->prepare("
        INSERT INTO members
        (first_name, last_name, email, major, grad_year, role, attendance_count)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $members = [
        ['Ava', 'Johnson', 'ava.johnson@fsc.edu', 'Computer Science', 2026, 'President', 10],
        ['Liam', 'Smith', 'liam.smith@fsc.edu', 'Information Systems', 2027, 'Vice President', 8],
        ['Sophia', 'Brown', 'sophia.brown@fsc.edu', 'Business Analytics', 2026, 'Treasurer', 7],
        ['Noah', 'Davis', 'noah.davis@fsc.edu', 'Cybersecurity', 2028, 'Member', 5],
        ['Mia', 'Wilson', 'mia.wilson@fsc.edu', 'Computer Programming', 2027, 'Secretary', 9]
    ];

    foreach ($members as $member) {
        $stmt->execute($member);
    }

    echo "<h2>Database setup completed successfully!</h2>";
    echo "<a href='register.html'>Go to Register</a>";

}
catch(PDOException $e) {
    die("Setup failed: " . $e->getMessage());
}

?>