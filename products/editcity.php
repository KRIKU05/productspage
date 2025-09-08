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
$countries = $stmt->get_result(); 

$stmt = $conn->prepare("SELECT * FROM country;");
$stmt->execute();
$result = $stmt->get_result();



$id = $_GET['id'];
$cityResult = $conn->query("SELECT * FROM city WHERE id=$id");
$product = $cityResult->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $country_id = $_POST['country_id'];

    $sql = "UPDATE city SET name='$name', country_id='$country_id', status='$status' WHERE id=$id";
    mysqli_query($conn, $sql);

    header("Location: cities.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit City</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Edit City</h4>
                <a href="cities.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST">
                
                <div class="mb-3">
                    <label>City Name</label>
                    <input type="text" name="name" class="form-control" 
                           value="<?= ($product['name']); ?>" required>
                </div>

              
                <div class="mb-3">
                        <label class="form-label">Country</label>
                        <select name="country_id" class="form-select" required>
                            <option value="">Select Country</option>
                            <?php foreach ($result as $country): ?>
                                <option value="<?php echo $country['id']; ?>">
                                    <?php echo ($country['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                </div>

            
                <div class="mb-3">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="1" <?= ($product['status']==1) ? "checked" : ""; ?>> Active
                    <input type="radio" name="status" value="0" <?= ($product['status']==0) ? "checked" : ""; ?>> Inactive
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
