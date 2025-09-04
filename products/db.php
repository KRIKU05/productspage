<?php
$conn = new mysqli("localhost", "root", "", "products");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
