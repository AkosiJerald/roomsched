<?php
    include 'conn.php';

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        die("Invalid request.");
    }

    $roomId = intval($_GET['id']);

    $sql = "SELECT * FROM rooms WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $roomId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Room not found.");
    }

    $room = $result->fetch_assoc();
    echo json_encode($room);
?>
