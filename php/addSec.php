<?php
include "conn.php";

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if (isset($_POST['student_yr']) && isset($_POST['section'])) {
        $student_yr = $_POST['student_yr'];
        $section = $_POST['section'];

        $yrSection = $student_yr . ' - ' . $section;

        $sql = "INSERT INTO yr_section (user_id, yrSection, student_yr, section) VALUES (?, ?, ?,?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }

        $stmt->bind_param("isss", $user_id, $yrSection, $student_yr, $section);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Record inserted successfully.";
        } else {
            echo "Failed to insert record.";
        }

        $stmt->close();
    } else {
        echo "student_yr or section not set.";
    }
} else {
    echo "User not logged in.";
}

$conn->close();
?>
