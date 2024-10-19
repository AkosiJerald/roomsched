<?php
    include 'conn.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $newPassword = $_POST['password'];

        // Update the password in the database
        $updateSql = "UPDATE users SET password = ? WHERE user_id = ?";
        if ($stmt = $conn->prepare($updateSql)) {
            $stmt->bind_param("si", $newPassword, $user_id);

            if ($stmt->execute()) {
                // Redirect to users.php with success message in the query string
                header("Location: users.php?message=success");
                exit();
            } else {
                echo "Error updating password: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }
    // Close connection
    $conn->close();
?>
