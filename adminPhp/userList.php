<?php
    include 'conn.php';

    if (isset($_GET['message']) && $_GET['message'] == 'success') {
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            Password updated successfully.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }

    if (isset($_GET['message']) && $_GET['message'] == 'delete') {
        echo "
        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            User Remove.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
    
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Query Failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Username</th>";
        echo "<th>Name</th>";
        echo "<th>Department</th>";
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        // Fetch rows from the result
        while($row = $result->fetch_assoc()) {
            $fullname = $row['fname'] . " " . $row['lname'];
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $fullname . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal" . $row['user_id'] . "'>Edit</button></td>";
            echo "<td><a href='userDelete.php?id=" . $row['user_id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a></td>";
        
            echo "</tr>";

            // Modal structure for editing user password
            echo "
            <div class='modal fade' id='editModal" . $row['user_id'] . "' tabindex='-1' aria-labelledby='editModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='editModalLabel'>Edit User: " . $row['username'] . "</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <form action='editUser.php' method='post'>
                                <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                                <div class='mb-3'>
                                    <label for='password' class='form-label'>New Password</label>
                                    <input type='password' class='form-control' name='password' id='password' required>
                                </div>
                                <button type='submit' class='btn btn-primary'>Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            ";
            
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No users found</p>";
    }
?>
