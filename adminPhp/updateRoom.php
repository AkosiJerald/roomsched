<?php
    include 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $roomId = intval($_POST['id']);
        $floor = $_POST['floor'];
        $roomNumber = $_POST['roomNumber'];

        $updateSql = "UPDATE rooms SET floor = ?, roomNumber = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param('ssi', $floor, $roomNumber, $roomId);
        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'Invalid request.';
    }
?>
