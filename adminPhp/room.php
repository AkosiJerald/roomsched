<?php 
    include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .content {
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-left: 350px;
            transition: margin-left 0.3s ease;
        }
        .content.full-width {
            margin-left: 0;
        }
    </style>
</head>
<body>
<div class="content">
    <form action="addRoom.php" method="POST">
        <div class="mb-3">
            <label for="floor" class="form-label">Floor</label>
            <select name="floor" id="floor" class="form-select" required>
                <option value="">Select a floor</option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
                <option value="5th">5th</option>
                <option value="6th">6th</option>
                <option value="7th">7th</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="roomNumber" class="form-label">Room Number</label>
            <input type="text" name="roomNumber" id="roomNumber" class="form-control" required>
        </div>    
        <button type="submit" class="btn btn-primary w-100">Submit</but>
    </form>     
</div>
   
<div class="content">    
    <h4 class="mb-4">List of Rooms</h4>
    <?php
    include 'roomList.php';
    ?>
</div>

<div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editRoomForm">
                        <input type="hidden" name="id" id="roomId">
                        <div class="mb-3">
                            <label for="editFloor" class="form-label">Floor</label>
                            <select name="floor" id="editFloor" class="form-select" required>
                                <option value="">Select a floor</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editRoomNumber" class="form-label">Room Number</label>
                            <input type="text" name="roomNumber" id="editRoomNumber" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Edit Room
            $('.edit-btn').on('click', function() {
                var roomId = $(this).data('id');
                
                $.ajax({
                    url: 'getRoom.php',
                    type: 'GET',
                    data: { id: roomId },
                    success: function(response) {
                        var data = JSON.parse(response);
                        $('#roomId').val(data.id);
                        $('#editFloor').val(data.floor);
                        $('#editRoomNumber').val(data.roomNumber);
                    }
                });
            });

            $('#editRoomForm').on('submit', function(event) {
                event.preventDefault();
                
                $.ajax({
                    url: 'updateRoom.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'success') {
                            location.reload(); // Reload the page to see changes
                        } else {
                            alert('Error updating room.');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
