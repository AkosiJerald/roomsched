<?php
include 'conn.php'; // Make sure this file contains your database connection logic

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if form fields are set
    if (isset($_POST['floor']) && isset($_POST['roomNumber'])) {
        $floor = $_POST['floor'];
        $roomNumber = $_POST['roomNumber'];

        // Validate input
        if (!empty($floor) && !empty($roomNumber)) {
            // Prepare SQL query to insert data into the database
            $stmt = $conn->prepare("INSERT INTO rooms (floor, roomNumber) VALUES (?, ?)");
            $stmt->bind_param("ss", $floor, $roomNumber);

            if ($stmt->execute()) {
                echo "Room added successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Please fill in all fields.";
        }
    } else {
        echo "Form data is missing.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
