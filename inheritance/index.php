<?php
require_once('./class/vehicles.php');
require_once('./class/moto.php');
require_once('./class/cars.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>

<?php

$moto = new Moto('Yamaha', 2);

// echo $moto->Vehicles;

echo "<br>";

$cars = new Cars('Renault', 4);

// echo $cars->Vehicles;

echo "<br>";

echo $cars->getVehicles();

echo "<br>";

echo $moto->getVehicles();

echo "<br>";

echo Cars::getRemorque();

echo "<br>";

echo Vehicles::getRemorque();

echo "<br>";

echo $moto->getMotorisation();

echo "<br>";

echo $cars::getMotorisation();
?>
    
</body>
</html>