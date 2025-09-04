<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include "db.php";
$current_user= $_SESSION['user']


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     <div class="container-mt-3">
       
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark text-light fixed-top ">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Crud ops</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
        </ul>
        <div class="d-flex justify-content-between align-items-center">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <?php echo $_SESSION['name']; ?>


</li>
</ul>&nbsp;
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<br>
</body>
</html>