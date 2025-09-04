<?php
// Database credentials
$servername = "localhost"; // MySQL server is on the same machine
$username   = "root";      // Default XAMPP username
$password   = "";          // Default XAMPP password is empty
$dbname="testdb";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully <br>";

echo $dbname;


// $sql = "CREATE DATABASE one";
// if ($conn->query($sql)===TRUE){
//     echo "Database created succesfully";
// }else{
//     echo "Error creating database: " . $conn->error;
// }
// $conn->close();

// ?>