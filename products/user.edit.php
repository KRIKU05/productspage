<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pic = $_FILES['pic']['name'];

    move_uploaded_file($_FILES['pic']['tmp_name'], 'pictures/' . $pic);

    $sql = "UPDATE users SET name='$name', number='$number', email='$email', pic='$pic' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: user.index.php");
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
            <h4>Edit User</h4>
            <a href="user.index.php" class="btn btn-secondary">Back</a>
</div>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>User Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label>Phone Number</label>
                    <input type="text" name="number" class="form-control" value="<?= $user['number']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $user['email']; ?>" required>
                </div>

              <div class="mb-3">
                    <label>User Image</label>
                    <img src ="images/<?= $user['pic']; ?>" style="height:100px; width:100px; ">
                    <input type="file" name="pic" class="form-control" required>
                </div>


                <button type="submit" class="btn btn-success">Update</button>
                <!-- <a href="index.php" class="btn btn-secondary">Back</a> -->
            </form>
        </div>
    </div>
</div>

</body>
</html>
