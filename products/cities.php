<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';
$stmt = $conn->prepare("SELECT * FROM city;"); 
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ciies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-3">
       <div class="d-flex justify-content-between align-items-center">
        <h1 class=" flex-grow-1">Cities</h1>
        <a href="createcity.php" class="btn btn-success">Create New</a>
        <!-- <a href="logout.php" class="btn btn-danger">Logout</a> -->
    </div>

        <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
             <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['status'] == 1 ? 'Active' : 'Inactive'; ?></td>
                <td>
                    <a href="editcity.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="viewcity.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    </div>
</div>

</body>
</html>