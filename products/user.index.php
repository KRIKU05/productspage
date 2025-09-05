<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';

$stmt = $conn->prepare("SELECT * FROM users;"); 
$stmt->execute();
$result = $stmt->get_result();
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
       <div class="d-flex justify-content-between align-items-center">
        <h1 class=" flex-grow-1">User Details</h1>
        <a href="newuser.php" class="btn btn-success">Create New</a>
        <!-- <a href="logout.php" class="btn btn-danger">Logout</a> -->
    </div>

        <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['number'] ?></td>
                <td><?= $row['email'] ?></td>
                  <td>
                    <a href="user.edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="user.view.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    </div>
</div>

</body>
</html>
