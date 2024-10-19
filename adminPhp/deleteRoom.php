<?php
    include 'conn.php';

    // Check if 'id' is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Create the SQL DELETE query
        $sql = "DELETE FROM rooms WHERE id = ?";

        // Prepare and bind
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);

            // Execute the query
            if ($stmt->execute()) {
                // If deletion is successful, redirect to the users list or show a success message
                header("Location: room.php?message=delete");
                exit();
            } else {
                // If there is an issue with execution
                echo "Error: " . $stmt->error;
            }
        } else {
            // If there is an issue with preparing the statement
            echo "Error: " . $conn->error;
        }
        
        // Close the statement
        $stmt->close();
    } 
    // Close the connection
    $conn->close();
?>
