<?php
$cars = array("Volvo", "BMW", "Toyota");
echo count($cars);
echo "<br>";
echo $cars[1];
echo "<br>";
foreach($cars as $c){
    echo $c . "<br>";

}
echo "<br>";
$car = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964, "type"=>"used");

foreach ($car as $x => $y) {
  echo "$x: $y <br>";
}

?>