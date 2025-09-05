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
    <div class="card shadow p-3">
        <h2 class="mb-3">User Details</h2>

        <div class='mb-4'>
            <p><strong>ID:</strong> <?= $user['id'] ?></p>
            <p><strong>Name:</strong> <?= $user['name'] ?></p>
            <p><strong>Phone number:</strong> <?= $user['number'] ?></p>
            <p><strong>Email:</strong> <?= $user['email']?></p>
        </div>

        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </div>
</div>

</body>
</html>
