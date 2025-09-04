<!DOCTYPE html>
<html>
<body>

<?php 
date_default_timezone_set("Asia/Kolkata");

$age=12; 

if ($age<=18){
    echo "You are ineligble to vote<br>";
}
else{
    echo "You are eligible to vote<br>";
}
$t = date("H");

$t = date("H");

if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
echo "<br>";
echo $t ;
echo "<br>";
$i=1;
while ($i<10){
    $i++;
    if ($i==6) continue;
    echo $i;
    echo "<br>";
}
$j=0;
while ($j<100){
    $j+=10;
    echo $j; echo "<br>";
}

for ($k=1;$k<=5;$k++){
    echo $k;
    echo "<br>";
}
$colors = ["red", "green", "blue"];
foreach($colors as $c){
    echo $c;echo "<br>";
}

$members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach($members as $n => $m){
    echo "$n : $m <br>";
}
$cars = array("Volvo", "BMW", "Toyota");
echo count($cars);
echo "<br>";
echo $cars[2];
$cars[2] = "Ford";
echo "<br>";
foreach ($cars as $p){
    echo $p;echo "<br>";
} 
?>
</body>
</html>