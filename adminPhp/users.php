<?php
    include 'nav.php';
    include 'editUser.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
   <form action="addUsers.php" method="post">
    <h1><i class="bi bi-people"></i>Users</h1>
       <div class="mb-3">
        <label for="fname" class="form-label">First name</label>
        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter first name">
       </div>

       <div class="mb-3">
        <label for="lname" class="form-label">Last name</label>
        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name">
       </div>

       <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
       </div>

       <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
       </div>

       <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type" id="type">
            <option value="">Select type</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
       </div>

       <div class="mb-3">
        <label for="department" class="form-label">Department</label>
        <select class="form-select" name="department" id="department">
            <option value="">Select department</option>
            <option value="CCJE">CCJE</option>
            <option value="CELA">CELA</option>
            <option value="CMA">CMA</option>
        </select>
       </div>

       <div class="mt-4">
           <button type="submit" class="btn btn-primary">Submit</button>
       </div>
    </form>
   </div>
   <div class="content">
    <h1>User List</h1>
    <?php
    include 'userList.php';
    ?>
   </div>

   <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
