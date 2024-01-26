<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Assign & Employee Registration System</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            background-image: url("images/cover.jpg");
            background-size: cover;
            font-family: Arial, sans-serif;
            
        }

        .container {
            align-items: center;
            margin-left: 100px;
            width: 200px;
            height: 100px;
            display: inline-block;
            margin: 20px;
            padding: 20px;
            background: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align:center;
        }

        .container:hover {
            transform: scale(1.05);
            transition: transform 0.3s;
        }

        .container a {
            text-decoration: none;
            color: #333;
        }

        .card img {
            height: 50px;
            width: 50px;
        }

        h1 {
            margin-top: 60px;
            text-align: center;
            color: #333;
            font-size: 36px;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: #333;
        }
        .container-group {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="navbar">
    
    <a href="emp.html">Add Employee</a>
    <a href="task.html">Add Task</a>
    <a href="activity.php">Assign Activities</a>
    <a href="assignform.php">Assign Task</a>
    <a href="report.php">Report</a>
    <a href="logout.php" style="margin-left: 800px;">Logout</a>
</div>

<h1>Task Assign & Employee Registration System</h1><br><br><br><br><br><br><br><br>

<a href="emp.html">
    <div class="container" style="margin-left: 200px;">
        <div class="card">
            <img src="employee.png" alt="" height="50px" width="50px">
            <h2>Add Employee</h2>
        </div>
    </div>
</a>
<a href="task.html">
    <div class="container">
        <div class="card">
            <img src="task.png" alt="" height="50px" width="50px">
            <h2>Add Task</h2>
        </div>
    </div>
</a>
<a href="activity.php">
    <div class="container">
        <div class="card">
            <img src="activity.png" alt="" height="50px" width="50px">
            <h2>Assign Activities</h2>
        </div>
    </div>
</a>
<a href="assignform.php">
    <div class="container">
        <div class="card">
            <img src="task to.png" alt="" height="50px" width="50px">
            <h2>Assign Task </h2>
        </div>
    </div>
</a>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>