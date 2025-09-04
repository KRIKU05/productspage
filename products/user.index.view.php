<?php
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
        <h2 class="mb-3">User Details</h2>

        <?php
        
        while ($row_users = $result->fetch_assoc()) {
            echo "<div class='mb-4'>";
            echo "<p><strong>ID:</strong> " . $row_users['id'] . "</p>";
            echo "<p><strong>Name:</strong> " . $row_users['name']. "</p>";
            echo "<p><strong>Phone number:</strong> " . $row_users['number'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row_users['email'] . "</p>";
            echo "<hr>";
            echo "</div>";
        }
        ?>

        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </div>
</div>

</body>
</html>
