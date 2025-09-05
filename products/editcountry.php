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

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM country WHERE id=$id");
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $flag = $_FILES['flag']['name'];
    
    move_uploaded_file($_FILES['flag']['tmp_name'], 'images/' . $flag);

    $sql = "UPDATE country SET name='$name', flag='$flag',  status='$status' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: country.php");
    exit();
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
            <h4>Edit Country</h4>
            <a href="country.php" class="btn btn-secondary">Back</a>
</div>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Country Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $product['name']; ?>" required>
                </div>
                
            
                    <div class="mb-3">
                    <label>Flag Image</label><br>
                    <img src ="images/<?= $row['flag']; ?>" style="height:100px; width:100px; ">
                    <input type="file" name="flag" class="form-control" required>

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
