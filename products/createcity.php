<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include 'header.php';

$stmt = $conn->prepare("SELECT * FROM country;");
$stmt->execute();
$result = $stmt->get_result();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $country_id = $_POST['country_id'];
    $status = $_POST['status'];

    $insert = $conn->prepare("INSERT INTO city (name, country_id, status) VALUES (?, ?, ?)");
    $insert->bind_param("sii", $name, $country_id, $status);

    if ($insert->execute()) {
        header("Location: cities.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error saving city.</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h4>Add New City</h4>
            <a href="cities.php" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST">
              
                <div class="mb-3">
                    <label class="form-label">City Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

               
                <div class="mb-3">
                        <label class="form-label">Country</label>
                        <select name="country_id" class="form-select" required>
                            <option value="">Select Country</option>
                            <?php foreach ($result as $country): ?>
                                <option value="<?php echo $country['id']; ?>">
                                    <?php echo htmlspecialchars($country['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                </div>

           
                <div class="mb-3">
                    <label class="form-label">Status</label><br>
                    <input type="radio" name="status" value="1" checked> Active
                    <input type="radio" name="status" value="0"> Inactive
                </div>

                <button type="submit" class="btn btn-success" name="submit">Save</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
