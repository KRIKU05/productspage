<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-3">
        <h2 class="mb-3">Product Details</h2>
        <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Status:</strong> <?php echo ($row['status'] ? 'Active' : 'Inactive'); ?></p>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>
</div>

</body>
</html>
