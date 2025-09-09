<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
include "header.php";

$id = $_GET['id'];


$result = $conn->query("SELECT * FROM country WHERE id=$id");
$country = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $status = $_POST['status'];

    if (!empty($_FILES['flag']['name'])) {
       
        $flag = $_FILES['flag']['name'];
        move_uploaded_file($_FILES['flag']['tmp_name'], 'images/country/' . $flag);

        $sql = "UPDATE country SET name='$name', flag='$flag', status='$status' WHERE id=$id";
    } else {
        
        $sql = "UPDATE country SET name='$name', status='$status' WHERE id=$id";
    }

    mysqli_query($conn, $sql);
    header("Location: country.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Edit Country</h4>
                <a href="country.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label>Country Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $country['name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label>Flag Image</label><br>
                    
                    <img src="images/country/<?= $country['flag']; ?>" id="currentFlag" style="height:100px; width:100px; ">

                    
                    <input type="file" name="flag" id="flagInput" class="form-control mt-2" accept="image/*">

                    
                    <img id="flagPreview" style="height:100px; width:100px; margin-top:10px; display:none; border:1px ">
                </div>

                <div class="mb-3">
                    <label>Status</label><br>
                    <input type="radio" name="status" value="1" <?= $country['status']==1 ? 'checked' : ''; ?>> Active
                    <input type="radio" name="status" value="0" <?= $country['status']==0 ? 'checked' : ''; ?>> Inactive
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('flagInput').onchange = evt => {
  const [file] = evt.target.files;
  const preview = document.getElementById('flagPreview');
  const current = document.getElementById('currentFlag');

  if (file) {
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
    current.style.display = 'none'; 
  } else {
    preview.style.display = 'none';
    current.style.display = 'block'; 
  }
};
</script>

</body>
</html>
