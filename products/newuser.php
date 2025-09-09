<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include "header.php";
$name = $phone = $email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["number"];  
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pic = $_FILES['pic']['name'];

    move_uploaded_file($_FILES['pic']['tmp_name'], 'images/users/' . $pic);

    if (empty($name)) { $errors['name'] = "Name is required"; }
    if (empty($phone)) { $errors['number'] = "Phone number is required"; }
    if (empty($email)) { $errors['email'] = "Email is required"; }
    if (empty($password)) { $errors['password'] = "Password is required"; }

    if (empty($errors)) {
        $conn = new mysqli("localhost", "root", "", "products");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO users (name, number, email, password, pic) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss", $name, $phone, $email, $password, $pic);

        if ($stmt->execute()) {
            header("Location: user.index.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>New user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center">
    <h1 class="text-center">Create Account</h1>
    <a href="user.index.php" class="btn btn-secondary">Back</a>
</div>
</div>
    <div class="card-body">
<form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Name" name="name" >
                <?php if (isset($errors['name'])) echo "<small class='text-danger'>{$errors['name']}</small>"; ?>
            </div>

            <div class="mb-3">
                <input type="tel" class="form-control" placeholder="Phone Number" name="number">
                <?php if (isset($errors['number'])) echo "<small class='text-danger'>{$errors['number']}</small>"; ?>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <?php if (isset($errors['email'])) echo "<small class='text-danger'>{$errors['email']}</small>"; ?>
            </div>
            <div class="mb-3">
                    <label>User Image</label>
                    <input type="file" name="pic" id="userInput" class="form-control" required>
                    <img id="userPreview" style="max-width:150px; margin-top:10px; display:none;">
                </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Enter Password" name="password">
                <?php if (isset($errors['password'])) echo "<small class='text-danger'>{$errors['password']}</small>"; ?>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>

document.getElementById('userInput').onchange = evt => {
    const [file] = evt.target.files;
    if (file) {
        const preview = document.getElementById('userPreview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
};
</script>
</body>
</html>
