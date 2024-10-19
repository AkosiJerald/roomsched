<?php
include 'conn.php';

// Retrieve POST data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];
$department = $_POST['department'];

// Prepare the SQL statement with placeholders
$insert = "INSERT INTO users (fname, lname, username, password, department, type) VALUES (?, ?, ?, ?, ?, ?)";

// Prepare and bind
$stmt = $conn->prepare($insert);
if ($stmt === false) {
    echo 'Failed to prepare the statement: ' . $conn->error;
    exit;
}

// Bind parameters
$stmt->bind_param('ssssss', $fname, $lname, $username, $password, $department, $type);

// Execute the statement
if ($stmt->execute()) {
    echo 'Success';
} else {
    echo 'Failed: ' . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
