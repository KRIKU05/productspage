<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include "db.php";
include "header.php";

$stmt = $conn->prepare("SELECT COUNT(name) AS count_products FROM products;");

    $stmt->execute();
    $result = $stmt->get_result();
    $row_products = $result->fetch_assoc();

 $stmt = $conn->prepare("SELECT COUNT(name) AS count_users FROM users;");

    $stmt->execute();
    $result = $stmt->get_result();
    $row_users = $result->fetch_assoc();


 $stmt = $conn->prepare("SELECT COUNT(name) AS count_countries FROM country;");

    $stmt->execute();
    $result = $stmt->get_result();
    $row_countries = $result->fetch_assoc();

 $stmt = $conn->prepare("SELECT COUNT(name) AS count_cities FROM city;");

    $stmt->execute();
    $result = $stmt->get_result();
    $row_cities = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-content">
    <div class="container my-5">
        <h1 class="mt-5 mb-4 text-center">Dashboard</h1>
        
        <div class="row g-4 justify-content-center">
       
            <div class="col-md-3 col-lg-3">
                <a href="index.php" class="text-decoration-none text-dark">
                    <div class="card shadow rounded-4 h-100">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <h3 class="card-title mb-3">Products</h3>
                            <p class="fs-4 fw-bold mb-4">(<?php echo $row_products['count_products']; ?>)</p>
                            <img src="favicons/product.png" alt="Products" class="img-fluid" style="max-height: 180px;" />
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-3 col-lg-3">
                <a href="user.index.php" class="text-decoration-none text-dark">
                    <div class="card shadow rounded-4 h-100">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <h3 class="card-title mb-3">Users</h3>
                            <p class="fs-4 fw-bold mb-4">(<?php echo $row_users['count_users']; ?>)</p>
                            <img src="favicons/users.png" alt="Users" class="img-fluid" style="max-height: 180px;" />
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-lg-3">
                <a href="country.php" class="text-decoration-none text-dark">
                    <div class="card shadow rounded-4 h-100">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <h3 class="card-title mb-3">Countries</h3>
                            <p class="fs-4 fw-bold mb-4">(<?php echo $row_countries['count_countries']; ?>)</p>
                            <img src="favicons/countries.png" alt="Users" class="img-fluid" style="max-height: 180px;" />
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-lg-3">
                <a href="cities.php" class="text-decoration-none text-dark">
                    <div class="card shadow rounded-4 h-100">
                        <div class="card-body d-flex flex-column align-items-center text-center">
                            <h3 class="card-title mb-3">Cities</h3>
                            <p class="fs-4 fw-bold mb-4">(<?php echo $row_cities['count_cities']; ?>)</p>
                            <img src="favicons/city.png" alt="Users" class="img-fluid" style="max-height: 180px;" />
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>



</body>
</html>