<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM country WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">



<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center">
            <h4>View Country</h4>
            <a href="country.php" class="btn btn-secondary">Back</a>
</div>
        </div>
        <div class="card-body">
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Status:</strong> <?php echo ($row['status'] ? 'Active' : 'Inactive'); ?></p>
        <p><strong>Flag: </strong>
       <img src ="images/<?= $row['flag']; ?>" style="height:100px; width:100px; "></p>
        </div>
    </div>
</div>



</body>
</html>
