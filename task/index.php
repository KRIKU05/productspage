<?php
include "db.php";
include "header.php";
$result = $conn->query("SELECT * FROM blogs");
$row = $result->fetch_assoc();

$abc= $conn->query("SELECT * FROM blog_categories");
$cat=$abc->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 py-5">
    <div class="card shadow p-3">
       <div class="d-flex justify-content-between align-items-center">
        <h1 class=" flex-grow-1 text-center">Blogs</h1>
        <a href="create.php" class="btn btn-success">Create New</a>
        &nbsp;
      
           
    </div>

    <table class="table  table-hover text-center">
        <thead>
            <tr>
                <th>Author</th>
                <th>Category</th>
                <th>Title</th>
                <th>No Of Views</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $cat['name']; ?></td> 
            <td><?= $row['title']; ?></td>
            <td><?= $row['no_of_view']; ?></td>
            <td><?= $row['active'] == 1 ? 'Active' : 'Inactive'; ?></td>
            <td>
                <a href="edit.php" class="btn btn-primary btn-sm">Edit</a>
                <a href="show.php" class="btn btn-info btn-sm">Show</a>
            </td>
        </tr>
    <?php } ?>
</tbody>
    </table>
 
</div>
      
</body>
</html>
