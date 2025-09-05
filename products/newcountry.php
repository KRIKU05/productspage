<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $flag = $_FILES['flag']['name'];
    
    move_uploaded_file($_FILES['flag']['tmp_name'], 'images/' . $flag);

    $sql = "INSERT INTO country (name, flag, status) VALUES ('$name', '$flag', '$status')";
    mysqli_query($conn, $sql);
    header("Location: country.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h4>Add New Country</h4>
            <a href="country.php" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Country Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Flag Image</label>
                    <input type="file" name="flag" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="1" checked> Active
                    <input type="radio" name="status" value="0"> Inactive
                </div>

                <button type="submit" class="btn btn-success" name="submit">Save</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
