<?php
$conn = new mysqli('localhost','root','','try');
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$user = null;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT fname, lname, phonenumber, email FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <h2 class="text-center mb-4">User Details</h2>
                <?php if ($user): ?>
                    <table class="table table-hover table-striped align-middle mb-4">
                        <tr><th>First Name</th><td><?= htmlspecialchars($user['fname']) ?></td></tr>
                        <tr><th>Last Name</th><td><?= htmlspecialchars($user['lname']) ?></td></tr>
                        <tr><th>Phone Number</th><td><?= htmlspecialchars($user['phonenumber']) ?></td></tr>
                        <tr><th>Email</th><td><?= htmlspecialchars($user['email']) ?></td></tr>
                    </table>
                    <div class="text-center">
                        <a href="index.php" class="btn btn-secondary">Back</a>
                        <a href="edit.php?id=<?= $id ?>" class="btn btn-primary">Edit</a>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center">
                        No user found.
                    </div>
                    <div class="text-center">
                        <a href="index.php" class="btn btn-secondary">Back</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
