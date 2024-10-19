<?php
                        include 'conn.php';

                        $sql = "SELECT * FROM rooms";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            die("Query Failed: " . $conn->error);
                        }

                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Floor</th>";
                            echo "<th>Room Number</th>";
                            echo "<th>Actions</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['floor'] . "</td>";
                                echo "<td>" . $row['roomNumber'] . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-warning btn-sm edit-btn' data-id='" . $row['id'] . "' data-bs-toggle='modal' data-bs-target='#editRoomModal'>Edit</button> ";
                                echo "<a href='deleteRoom.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>";
                              
                                echo "</td>";
                                echo "</tr>";
                            }

                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "<p>No rooms found</p>";
                        }
                    ?>