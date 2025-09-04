<?php
$errors = [];
$name = $lname = $phone = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || !preg_match("/^[a-zA-Z]+$/", $_POST["name"])) {
        $errors['name'] = "Valid first name required";
    } else { $name = trim($_POST["name"]); }

    if (empty($_POST["lname"]) || !preg_match("/^[a-zA-Z]+$/", $_POST["lname"])) {
        $errors['lname'] = "Valid last name required";
    } else { $lname = trim($_POST["lname"]); }

    if (empty($_POST["phonenumber"]) || !preg_match("/^[0-9]{10}$/", $_POST["phonenumber"])) {
        $errors['phonenumber'] = "Valid 10-digit phone required";
    } else { $phone = trim($_POST["phonenumber"]); }

    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email required";
    } else { $email = trim($_POST["email"]); }

    if (!$errors) {
        $conn = new mysqli("localhost", "root", "", "try");
        $stmt = $conn->prepare("INSERT INTO users (fname, lname, phonenumber, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $lname, $phone, $email);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: index.php"); 
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg w-50 border-0 rounded-4">
            <div class="card-body p-5">
                <h2 class="text-center mb-4"> Create New User</h2>
                <form method="post" action="">
                    
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control <?php if(isset($errors['name'])) echo 'is-invalid'; ?>" 
                               name="name" value="<?= htmlspecialchars($name) ?>">
                        <div class="invalid-feedback"><?= $errors['name'] ?? '' ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control <?php if(isset($errors['lname'])) echo 'is-invalid'; ?>" 
                               name="lname" value="<?= htmlspecialchars($lname) ?>">
                        <div class="invalid-feedback"><?= $errors['lname'] ?? '' ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control <?php if(isset($errors['phonenumber'])) echo 'is-invalid'; ?>" 
                               name="phonenumber" value="<?= htmlspecialchars($phone) ?>">
                        <div class="invalid-feedback"><?= $errors['phonenumber'] ?? '' ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control <?php if(isset($errors['email'])) echo 'is-invalid'; ?>" 
                               name="email" value="<?= htmlspecialchars($email) ?>">
                        <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg"> Save User</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
