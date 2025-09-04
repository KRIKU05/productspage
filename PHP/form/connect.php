<html>
<body>

<?php 
$fname=$_POST["name"];
echo $fname;
echo "<br>";
$lname=$_POST["lname"];
echo $lname;
echo "<br>";
$email=$_POST["email"];
echo $email;
echo "<br>";
$phone=$_POST["phonenumber"];
echo $phone;
echo "<br>";

$conn = new mysqli('localhost','root','','try');
if($conn->connect_error){
    die("Connection fialed: " . $conn->connect_error);
}else{
    $stmt=$conn->prepare("INSERT into users (fname,lname,phonenumber,email) values(?,?,?,?)");
    $stmt->bind_param("ssis",$fname,$lname,$phone,$email,);
    $stmt->execute();
    echo "We will contact you soon...";
    $stmt->close();
    $conn->close();
}



?>

</body>
</html>