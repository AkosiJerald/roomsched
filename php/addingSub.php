<?php
    include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        .content.full-width {
            margin-left: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ced4da;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .form-group input[type="text"] {
            padding: 10px;
        }
        .form-group select {
            padding: 10px;
        }
        .content h2 {
            margin-top: 0;
            font-size: 1.5rem;
        }
        
    </style>
</head>
<body>
    <div class="content">
        <h2>Section Adding</h2>
        <form action="addSec.php" method="post">
            <div class="form-group">
                <label for="student_yr">Year</label>
                <select name="student_yr" id="student_yr" required>
                    <option value="">Select Year</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                </select>
            </div>
            <div class="form-group">
                <label for="section">Section</label>
                <input type="text" name="section" id="section" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
        <br>
        <h2>Subject Adding</h2>
        <form action="addSub.php" method="post">
            <?php include "fetchYrSec.php"; ?>
            
            <div class="form-group">
                <label for="subject_code">Subject Code</label>
                <input type="text" name="subject_code" id="subject_code" required>
            </div>
            <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" id="subject_name" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
    <script>
        function toggleContent() {
    const content = document.getElementById('content');
    content.classList.toggle('full-width');
}
    </script>
</body>
</html>
