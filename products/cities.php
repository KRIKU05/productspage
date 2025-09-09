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

$totalResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM city");
$totalRows   = mysqli_fetch_assoc($totalResult)['total'];
$totalPages  = ceil($totalRows / $limit);

$sql = "SELECT * FROM city ORDER BY name ASC LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);

$stmt = $conn->prepare("SELECT * FROM country;");
$stmt->execute();
$country = $stmt->get_result();

$showcountry = [];
while ($c = mysqli_fetch_assoc($country)) {
    $showcountry[$c['id']] = [
        'name' => $c['name'],
        'flag' => $c['flag']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="flex-grow-1">Cities</h1>
            <a href="createcity.php" class="btn btn-success">Create New</a>&nbsp;
            <a href="dashboard.php" class="btn btn-secondary">Back</a>
        </div>

        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                  
                    <th>Country</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    
                    <td>
                        <?php 
                        $country = $showcountry[$row['country_id']];
                        $flagPath = "images/country/" . $country['flag'];
                        ?>
                        <img src="<?= $flagPath ?>" 
                             alt="<?= $country['name']; ?> flag" 
                             style="width:30px; height:auto; margin-right:5px;">
                        <?= $country['name']; ?>
                    </td>
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

    <nav class="d-flex justify-content-between align-items-center">
        <ul class="pagination mb-0">
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?= $page-1; ?>">Previous</a>
            </li>&nbsp;

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>&nbsp;

            <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?= $page+1; ?>">Next</a>
            </li>
        </ul>

        
    </nav>
</div>

</body>
</html>
