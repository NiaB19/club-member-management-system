<?php
include 'dbconnect.php';

$sqlUsers= "CREATE TABLE users(
    username VARCHAR(50) PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB";

if ($conn->query($sqlMembers) === TRUE) {
    echo "Members table created.<br>";
} else {
    echo "Error creating members table: " . $conn->error . "<br>";
}

$sqlInsert = "INSERT INTO members 
(first_name, last_name, email, major, grad_year, role, attendance_count)
VALUES 
('Ava', 'Johnson', 'ava.johnson@fsc.edu', 'Computer Science', 2026, 'President', 10),
('Liam', 'Smith', 'liam.smith@fsc.edu', 'Information Systems', 2027, 'Vice President', 8),
('Sophia', 'Brown', 'sophia.brown@fsc.edu', 'Business Analytics', 2026, 'Treasurer', 7),
('Noah', 'Davis', 'noah.davis@fsc.edu', 'Cybersecurity', 2028, 'Member', 5),
('Mia', 'Wilson', 'mia.wilson@fsc.edu', 'Computer Programming', 2027, 'Secretary', 9)";

if ($conn->query($sqlInsert) === TRUE) {
    echo "Starter member records inserted.<br>";
} else {
    echo "Error inserting records: " . $conn->error . "<br>";
}

echo "<h2>Database setup completed successfully!</h2>";
echo "<a href='index.php'>Go to Home</a>";

$conn->close();
?>



?>