<?php
include "conn.php";

// Start the session only if it hasn't been started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Prepare your SQL statement
    $sql = "SELECT yrSection FROM yr_section WHERE user_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $stmt->bind_result($yrSection);

            // Generate the dropdown menu with Bootstrap styling
            echo '
            <div class="form-group">
                <label for="YrSection">Yr & Section</label>
                <select name="YrSection" id="YrSection" class="form-control">';

            // Fetch the results and populate the dropdown
            while ($stmt->fetch()) {
                echo '<option value="' . htmlspecialchars($yrSection, ENT_QUOTES) . '">' . htmlspecialchars($yrSection, ENT_QUOTES) . '</option>';
            }

            echo '
                </select>
            </div>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "User not logged in.";
}

$conn->close();
?>
