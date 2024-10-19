<?php
header('Content-Type: application/json');
session_start();
include 'conn.php';

$subjects = [];  // Initialize subjects array

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if (isset($_GET['yrSection'])) {
        $yrSection = $_GET['yrSection'];
    
        // Updated SQL query with correct parameter binding
        $sql = "SELECT subject.subject_code, subject.subject_name 
                FROM subject 
                JOIN yr_section ON subject.yrSection = yr_section.yrSection 
                WHERE yr_section.user_id = ? AND subject.yrSection = ?";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo json_encode(["error" => "Failed to prepare statement: " . $conn->error]);
            exit;
        }

        // Bind both user_id and yrSection
        $stmt->bind_param('ss', $user_id, $yrSection);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $subjects[] = $row['subject_code'] . ' - ' . $row['subject_name'];
            }
        } else {
            echo json_encode(["error" => "Failed to execute query"]);
            exit;
        }
        
        $stmt->close();
    } else {
        echo json_encode(["error" => "Missing section or year parameters"]);
        exit;
    }
} else {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

$conn->close();

echo json_encode([
    'subjects' => $subjects
]);

?>
