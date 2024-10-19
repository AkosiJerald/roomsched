<?php 
include "conn.php"; // Ensure this file connects to the database and assigns the connection to $conn

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if (isset($_POST['subject_code']) && isset($_POST['subject_name']) && isset($_POST['YrSection'])) {
        $subject_code = $_POST['subject_code'];
        $subject_name = $_POST['subject_name'];
        $YrSection = $_POST['YrSection'];

        // Check if record exists
        $checkSql = "SELECT COUNT(*) FROM subject WHERE subject_code = ? AND YrSection = ?";
        if ($stmt = $conn->prepare($checkSql)) {
            $stmt->bind_param("ss", $subject_code, $YrSection);
            $stmt->execute();
            $stmt->bind_result($exists);
            $stmt->fetch();
            $stmt->close();

            if ($exists == 0) {
                $insertSql = "INSERT INTO subject (user_id, subject_code, subject_name, yrSection) VALUES (?, ?, ?, ?)";
                if ($stmt = $conn->prepare($insertSql)) {
                    $stmt->bind_param("isss", $user_id, $subject_code, $subject_name, $YrSection);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo "Record inserted successfully.";
                    } else {
                        echo "Failed to insert record.";
                    }
                    $stmt->close();
                } else {
                    echo "Error preparing insert statement: " . $conn->error;
                }
            } else {
                echo "Record with the same subject_code and YrSection already exists.";
            }
        } else {
            echo "Error preparing check statement: " . $conn->error;
        }
    } else {
        echo "Subject code, name, or YrSection not set.";
    }
} else {
    echo "User not logged in.";
}

// Close the database connection
$conn->close();
?>
