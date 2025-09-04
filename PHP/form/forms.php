<?php
$errors = [];
$name = $lname = $phone = $email = $pswd = $cpswd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    if (empty($_POST["name"]) || !preg_match("/^[a-zA-Z]+$/", $_POST["name"])) {
        $errors['name'] = "Please enter a valid first name (letters only)";
    } else {
        $name = trim($_POST["name"]);
    }

    if (empty($_POST["lname"]) || !preg_match("/^[a-zA-Z]+$/", $_POST["lname"])) {
        $errors['lname'] = "Please enter a valid last name (letters only)";
    } else {
        $lname = trim($_POST["lname"]);
    }

  
    if (empty($_POST["phonenumber"]) || !preg_match("/^[0-9]{10}$/", $_POST["phonenumber"])) {
        $errors['phonenumber'] = "Please enter a valid 10-digit phone number";
    } else {
        $phone = trim($_POST["phonenumber"]);
    }

  
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address";
    } else {
        $email = trim($_POST["email"]);
    }


    if (empty($_POST["pswd"]) || strlen($_POST["pswd"]) < 6) {
        $errors['pswd'] = "Password must be at least 6 characters long";
    } else {
        $pswd = $_POST["pswd"];
    }


    if ($_POST["cpswd"] !== $_POST["pswd"]) {
        $errors['cpswd'] = "Passwords do not match";
    } else {
        $cpswd = $_POST["cpswd"];
    }

    if (empty($errors)) {
        $conn = new mysqli("localhost", "root", "", "try");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO users (fname, lname, phonenumber, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $lname, $phone, $email);

        if ($stmt->execute()) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            Form submitted successfully!
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
} else {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Database error: " . htmlspecialchars($stmt->error) . "
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
}
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="card card-h-100 mx-auto mt-5 w-50 p-5 text-bg-dark rounded">
    <div class="card-title">
        <h1 class="text-center">Contact Me</h1>
        <div class="card-body">
            <div class="container mt-3">
                <form method="post" action="forms.php">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="First Name" name="name" value="<?= htmlspecialchars($name) ?>">
                            <?php if (isset($errors['name'])) echo "<small class='text-danger'>{$errors['name']}</small>"; ?>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?= htmlspecialchars($lname) ?>">
                            <?php if (isset($errors['lname'])) echo "<small class='text-danger'>{$errors['lname']}</small>"; ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <input type="tel" class="form-control" placeholder="Phone Number" name="phonenumber" value="<?= htmlspecialchars($phone) ?>">
                            <?php if (isset($errors['phonenumber'])) echo "<small class='text-danger'>{$errors['phonenumber']}</small>"; ?>
                        </div>
                        <div class="col-6">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= htmlspecialchars($email) ?>">
                            <?php if (isset($errors['email'])) echo "<small class='text-danger'>{$errors['email']}</small>"; ?>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <input type="password" class="form-control" placeholder="Enter password" name="pswd">
                            <?php if (isset($errors['pswd'])) echo "<small class='text-danger'>{$errors['pswd']}</small>"; ?>
                        </div>
                        <div class="col-6">
                            <input type="password" class="form-control" placeholder="Confirm password" name="cpswd">
                            <?php if (isset($errors['cpswd'])) echo "<small class='text-danger'>{$errors['cpswd']}</small>"; ?>
                        </div>
                    </div>

                    <div class="row mt-3 text-center">
                        <div><a href="forms.php">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
