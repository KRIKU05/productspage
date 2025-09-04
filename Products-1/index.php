<?php
$conn = new mysqli("localhost", "root", "", "try");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo"Connected";
}
$result = $conn->query("SELECT id, pname FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
<div class="card shadow p-4 mt-4">
        <h2 class="mb-4">Product List</h2>
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM products");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['pname']}</td>
                                <td>".($row['status'] ? 'Active' : 'Inactive')."</td>
                                <td> <a href='edit.php'><button class='btn btn-dark'>Edit</button>
                                <a href='view.php'><button class='btn btn-dark'>View</button></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
            </div>
</body>
</html>