<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';
include 'header.php';
$limit = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

$totalResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products");
$totalRows   = mysqli_fetch_assoc($totalResult)['total'];
$totalPages  = ceil($totalRows / $limit);

$sql = "SELECT * FROM products ORDER BY orderof ASC LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<br>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class=" flex-grow-1">Products</h1>
        <a href="create.php" class="btn btn-success">Create New</a>
        <!-- <a href="logout.php" class="btn btn-danger">Logout</a> -->
    </div>

    <table class="table table-bordered table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
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
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="view.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    
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
