<?php

$conn = new mysqli("localhost", "root", "", "try");
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

if (isset($_POST['add'])) {
    $pname  = $_POST['pname'];
    $status = $_POST['status'];
    $conn->query("INSERT INTO products (pname, status) VALUES ('$pname','$status')");
    echo "<p>Product added!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body >


<div class="container mt-5">
    <div class="card bg-dark text-white p-4">
        <h2 class="mb-3">Add Product</h2>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <input type="text" name="pname" class="form-control" placeholder="Product Name" required>
            </div>
            <div class="mb-3">
                <label class="form-label me-3">Status:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="1" checked>
                    <label class="form-check-label">Active</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="0">
                    <label class="form-check-label">Inactive</label>
                </div>
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add Product</button>
        </form>

    </div>

    
</div>

</body>
</html>