<?php
    
// Start the session only if it hasn't been started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <style>
        .sidebar .nav-bg{
            margin-top:15% ;
            font-size: 20px;
            width: 300px;
            text-align: center;
            color: black;
            height: 50vh; 
            
          
        }
        .sidebar .nav-bg a{
            text-decoration: none;
            color: black;
            
        }
        .sidebar {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.3s ease;
            font-family: "Goldman", sans-serif;
            font-weight: 700;
            font-style: normal;
            font-size: 12px;
            color: black;
            height: 100vh;   
        }
        .sidebar.hidden {
        transform: translateX(-100%);
        transition: all 0.3s ease;
        }
        .buttonDiv{
            background-color: rgba(57, 182, 255, 0.44);

        }
        .content.full-width {
        margin-left: 0;
    }
        </style>
<body>



<div class="sidebar" id="sidebar">
    <div class="d-block img-div text-center"  >
        <img src="../img/logo.png" alt="" class="img-fluid mt-5" >
            <h4 class="mt-4">Room Scheduler</h4>
            
        </div>
    <div class="nav-bg pt-5">
            <i class="bi bi-house-door-fill "></i>
            <a href="home.php" class="" >Home</a>
            <br>
            <br>
            <i class="bi bi-calendar-day-fill "></i>
            <a href="addingSub.php">Subjects</a>
            <br>
            <br>
            <i class="bi bi-book-fill" ></i>
            <a href="subject.php">Schedule</a>
    </div>
</div>
<script src="../js/sidebar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>