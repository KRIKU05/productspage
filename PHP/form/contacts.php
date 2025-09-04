<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $conn = new mysqli('localhost','root','','try');
if($conn->connect_error){
    die("Connection fialed: " . $conn->connect_error);
    }else{
        echo "Connected <br>";

        $sql = "SELECT id, fname, lname, phonenumber, email FROM users";
        $result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. " -Email: " . $row['email'] . " -Phone number: " . $row['phonenumber'] ."<br>"; 
  }
} else {
  echo "0 results";
}
$conn->close();
    }

    ?>
</body>
</html>