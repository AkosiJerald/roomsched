<?php
session_start();

header('Content-Type: application/json');

include 'conn.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT DISTINCT yrSection FROM yr_section WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['yrSection'];
        }
    }

    echo json_encode($data);
} else {
    echo json_encode(['error' => 'User not authenticated']);
    exit;
}

$stmt->close();
$conn->close();
?>
