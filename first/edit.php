<?php
$errors = [];
$conn = new mysqli("localhost", "root", "", "try");
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) { die("Invalid ID"); }
$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT fname, lname, phonenumber, email FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows !== 1) { die("User not found"); }
$user = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user['fname'] = trim($_POST["name"]);
    $user['lname'] = trim($_POST["lname"]);
    $user['phonenumber'] = trim($_POST["phonenumber"]);
    $user['email'] = trim($_POST["email"]);

    if (empty($user['fname']) || !preg_match("/^[a-zA-Z]+$/", $user['fname'])) $errors['name'] = "Valid first name required";
    if (empty($user['lname']) || !preg_match("/^[a-zA-Z]+$/", $user['lname'])) $errors['lname'] = "Valid last name required";
    if (empty($user['phonenumber']) || !preg_match("/^[0-9]{10}$/", $user['phonenumber'])) $errors['phonenumber'] = "Valid 10-digit phone required";
    if (empty($user['email']) || !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = "Valid email required";

    if (!$errors) {
        $stmt = $conn->prepare("UPDATE users SET fname=?, lname=?, phonenumber=?, email=? WHERE id=?");
        $stmt->bind_param("ssssi", $user['fname'], $user['lname'], $user['phonenumber'], $user['email'], $id);
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
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg w-50 border-0 rounded-4">
            <div class="card-body p-5">
                <h2 class="text-center mb-4"> Edit User</h2>
                <form method="post" action="edit.php?id=<?= $id ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control <?php if(isset($errors['name'])) echo 'is-invalid'; ?>" 
                               name="name" value="<?= htmlspecialchars($user['fname']) ?>">
                        <div class="invalid-feedback"><?= $errors['name'] ?? '' ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control <?php if(isset($errors['lname'])) echo 'is-invalid'; ?>" 
                               name="lname" value="<?= htmlspecialchars($user['lname']) ?>">
                        <div class="invalid-feedback"><?= $errors['lname'] ?? '' ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control <?php if(isset($errors['phonenumber'])) echo 'is-invalid'; ?>" 
                               name="phonenumber" value="<?= htmlspecialchars($user['phonenumber']) ?>">
                        <div class="invalid-feedback"><?= $errors['phonenumber'] ?? '' ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control <?php if(isset($errors['email'])) echo 'is-invalid'; ?>" 
                               name="email" value="<?= htmlspecialchars($user['email']) ?>">
                        <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="index.php" class="btn btn-secondary"> Back</a>
                        <button type="submit" class="btn btn-primary"> Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
