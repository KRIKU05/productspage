<?php
$conn = new mysqli("localhost", "root", "", "try");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT id, fname, lname, phonenumber, email FROM users");
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"> User Management</h2>
                    <a href="create.php" class="btn btn-success">Create New</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th style="width: 160px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row["fname"]) ?></td>
                                        <td><?= htmlspecialchars($row["lname"]) ?></td>
                                        <td><?= htmlspecialchars($row["phonenumber"]) ?></td>
                                        <td><?= htmlspecialchars($row["email"]) ?></td>
                                        <td><a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm"> View</a>
                                            
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-muted">No users found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
