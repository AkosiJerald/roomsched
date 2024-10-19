<?php
include 'conn.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Prepare SQL query to fetch room numbers
    $stmt = $conn->prepare("SELECT roomNumber FROM rooms");
    $stmt->execute();
    $result = $stmt->get_result();

    $rooms = [];
    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row['roomNumber'];
    }

    echo json_encode($rooms);  // This should be a JSON array

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
