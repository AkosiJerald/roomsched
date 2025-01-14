<?php
    include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Page</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        form {
            margin: 20px 0;
        }
        .schedule-container {
            display: flex;
            gap: 20px;
        }
        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 10px;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header, .time-slot {
            font-weight: bold;
            text-align: center;
            border: 1px solid black;
            color: rgb(0, 0, 0);
            padding: 10px;
            
        }
        .time-slot {
            background-color: #f0f0f0;
            color: #333;
        }
        .droppable {
            border: 2px dashed #ccc;
            
            border-radius: 5px;
            background-color: #fafafa;
            transition: background-color 0.2s;
        }
        .droppable:hover {
            background-color: #e0f7fa;
        }
        .draggable {
            cursor: move;
            padding: 10px;
            margin: 5px;
            background-color: #4caf50;
            color: white;
            border: 1px solid #999;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s;
        }
        .draggable:active {
            background-color: #388e3c;
        }
        #draggable-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
      
    </style>
</head>
<body>
    <div class="content">
        <form id="selection-form">
            <label for="yr-container">Choose a year and section:</label>
            <select id="yr-container" name="yr-container" required>
                <option value="">Year & Section</option>
            </select>
            <br>
            <input type="submit" value="Submit">
        </form>
        
   
    <div class="" style="display: flex;">  
        <div class="schedule-container" id="scheduleContainer">
            
            <div id="draggable-container">
                <h3>Subject List</h3>
                
            </div> 
            <br/>
            <br/>
            <div class="schedule-grid">
                <div class="header" id="roomHeader"></div>
                <div class="header">Monday</div>
                <div class="header">Tuesday</div>
                <div class="header">Wednesday</div>
                <div class="header">Thursday</div>
                <div class="header">Friday</div>
                
                <div class="time-slot">7:00 - 7:30</div>
                <div class="droppable" id="mon_7:00_7:30"></div>
                <div class="droppable" id="tue_7:00_7:30"></div>
                <div class="droppable" id="wed_7:00_7:30"></div>
                <div class="droppable" id="thu_7:00_7:30"></div>
                <div class="droppable" id="fri_7:00_7:30"></div>
        
                <div class="time-slot">7:30 - 8:00</div>
                <div class="droppable" id="mon_7:30_8:00"></div>
                <div class="droppable" id="tue_7:30_8:00"></div>
                <div class="droppable" id="wed_7:30_8:00"></div>
                <div class="droppable" id="thu_7:30_8:00"></div>
                <div class="droppable" id="fri_7:30_8:00"></div>
        
                <div class="time-slot">8:00 - 8:30</div>
                <div class="droppable" id="mon_8:00_8:30"></div>
                <div class="droppable" id="tue_8:00_8:30"></div>
                <div class="droppable" id="wed_8:00_8:30"></div>
                <div class="droppable" id="thu_8:00_8:30"></div>
                <div class="droppable" id="fri_8:00_8:30"></div>

                <div class="time-slot">8:30 - 9:00</div>
                <div class="droppable" id="mon_8:30_9:00"></div>
                <div class="droppable" id="tue_8:30_9:00"></div>
                <div class="droppable" id="wed_8:30_9:00"></div>
                <div class="droppable" id="thu_8:30_9:00"></div>
                <div class="droppable" id="fri_8:30_9:00"></div>

                <div class="time-slot">9:00 - 9:30</div>
                <div class="droppable" id="mon_9:00_9:30"></div>
                <div class="droppable" id="tue_9:00_9:30"></div>
                <div class="droppable" id="wed_9:00_9:30"></div>
                <div class="droppable" id="thu_9:00_9:30"></div>
                <div class="droppable" id="fri_9:00_9:30"></div>

                <div class="time-slot">9:30 - 10:00</div>
                <div class="droppable" id="mon_9:30_10:00"></div>
                <div class="droppable" id="tue_9:30_10:00"></div>
                <div class="droppable" id="wed_9:30_10:00"></div>
                <div class="droppable" id="thu_9:30_10:00"></div>
                <div class="droppable" id="fri_9:30_10:00"></div>

                <div class="time-slot">10:00 - 10:30</div>
                <div class="droppable" id="mon_10:00_10:30"></div>
                <div class="droppable" id="tue_10:00_10:30"></div>
                <div class="droppable" id="wed_10:00_10:30"></div>
                <div class="droppable" id="thu_10:00_10:30"></div>
                <div class="droppable" id="fri_10:00_10:30"></div>

                <div class="time-slot">10:30 - 11:00</div>
                <div class="droppable" id="mon_10:30_11:00"></div>
                <div class="droppable" id="tue_10:30_11:00"></div>
                <div class="droppable" id="wed_10:30_11:00"></div>
                <div class="droppable" id="thu_10:30_11:00"></div>
                <div class="droppable" id="fri_10:30_11:00"></div>

                <div class="time-slot">11:00 - 11:30</div>
                <div class="droppable" id="mon_11:00_11:30"></div>
                <div class="droppable" id="tue_11:00_11:30"></div>
                <div class="droppable" id="wed_11:00_11:30"></div>
                <div class="droppable" id="thu_11:00_11:30"></div>
                <div class="droppable" id="fri_11:00_11:30"></div>

                <div class="time-slot">11:30 - 12:00</div>
                <div class="droppable" id="mon_11:30_12:00"></div>
                <div class="droppable" id="tue_11:30_12:00"></div>
                <div class="droppable" id="wed_11:30_12:00"></div>
                <div class="droppable" id="thu_11:30_12:00"></div>
                <div class="droppable" id="fri_11:30_12:00"></div>
                
            </div>
        
        </div>
        
        <div class="room-list">
            <button id="saveScheduleButton">Save Schedule</button>
            <br>
            
            <div id="room-buttons">
                <!-- Buttons will be dynamically inserted here -->
            </div>
        </div>
    </div>
</div>
   
   <script src="../js/fetchYear.js"></script>
   <script src="../js/fetchSub.js"></script>
   <script src="../js/saveSched.js"></script>
   <script src="../js/displaySched.js"></script>
   <script src="../js/sidebar.js"></script>
   <script src="../js/fetchRooms.js"></script>
</body>
</html>
