<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';

$email = $_SESSION['user'];
$result = $conn->query("SELECT * FROM users WHERE email='$email'");


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center">
            <h4>View Users</h4>
            <a href="dashboard.php" class="btn btn-secondary">Back</a>
</div>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> <?= $user['name'] ?></p>
            <p><strong>Phone number:</strong> <?= $user['number'] ?></p>
            <p><strong>Email:</strong> <?= $user['email']?></p>
              <p><strong>Image:</strong><img src="pictures/<?= $user['pic'];?>" style="height:100px; width:100px; "> </p>
        </div>
        
    </div>
</div>

</body>
</html>
