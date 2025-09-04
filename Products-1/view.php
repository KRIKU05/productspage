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
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>