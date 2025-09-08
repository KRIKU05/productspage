<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

$totalResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$totalRows   = mysqli_fetch_assoc($totalResult)['total'];
$totalPages  = ceil($totalRows / $limit);


$sql = "SELECT * FROM users ORDER BY id ASC LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);

// $stmt = $conn->prepare("SELECT * FROM users;"); 
// $stmt->execute();
// $result = $stmt->get_result();
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


<nav class="d-flex justify-content-between align-items-center">
  <ul class="pagination mb-0">
    <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
      <a class="page-link" href="?page=<?= $page-1; ?>">Previous</a>
    </li>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
      </li>
    <?php endfor; ?>

    <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
      <a class="page-link" href="?page=<?= $page+1; ?>">Next</a>
    </li>
  </ul>

   <a href="dashboard.php" class="btn btn-secondary">Back</a>
</nav>
    


</div>

</body>
</html>
