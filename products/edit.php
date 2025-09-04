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
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $status = $_POST['status'];

    $sql = "UPDATE products SET name='$name', status='$status' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center">
            <h4>Edit Product</h4>
            <a href="index.php" class="btn btn-secondary">Back</a>
</div>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $product['name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="1" <?php if($product['status']==1) echo "checked"; ?>> Active
                    <input type="radio" name="status" value="0" <?php if($product['status']==0) echo "checked"; ?>> Inactive
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <!-- <a href="index.php" class="btn btn-secondary">Back</a> -->
            </form>
        </div>
    </div>
</div>

</body>
</html>
