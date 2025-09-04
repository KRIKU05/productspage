<?php
$name = $phone = $email = $password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["number"];  
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($name)) { $errors['name'] = "Name is required"; }
    if (empty($phone)) { $errors['number'] = "Phone number is required"; }
    if (empty($email)) { $errors['email'] = "Email is required"; }
    if (empty($password)) { $errors['password'] = "Password is required"; }

    if (empty($errors)) {
        $conn = new mysqli("localhost", "root", "", "products");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO users (name, number, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $name, $phone, $email, $password);

        if ($stmt->execute()) {
            header("Location: index.php");
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
    <title>Contact Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="card mx-auto mt-5 w-50 p-5 text-bg-dark rounded">
    <h1 class="text-center">Create Account</h1>
    <div class="card-body">
        <form method="post" action="">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Name" name="name" value="<?= htmlspecialchars($name) ?>">
                <?php if (isset($errors['name'])) echo "<small class='text-danger'>{$errors['name']}</small>"; ?>
            </div>

            <div class="mb-3">
                <input type="tele" class="form-control" placeholder="Phone Number" name="number">
                <?php if (isset($errors['number'])) echo "<small class='text-danger'>{$errors['number']}</small>"; ?>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <?php if (isset($errors['email'])) echo "<small class='text-danger'>{$errors['email']}</small>"; ?>
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
</body>
</html>
