<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php

    require('classes/voiture.php');

    $x = new Cars(24, "Mercedes", 1.8, '8/100');

    // echo $x->marque;

    echo "<br>";

    // $x->marque = "Citroën";

    // echo $x->marque;

    echo "<br>";

    echo $x->wheel;

    var_dump($x);

    $y = new Cars(22, "Fiat", 2.2, '4.7/100');

    echo "<br>";

    // echo $y->marque;

    echo "<br>";

    echo $x->hellomycars();

    echo "<br>";

    echo $y->getmarque();

    $y->setMarque('Seat');

    echo "<br>";

    echo $y->getmarque();

    echo "<br>";

    echo "Nombre de roues " . $y->getNbRoue();

    echo "<br>";

    echo "Nombre de roues " . $y::NB_ROUE;

    echo "<br>";

    echo $y::NB_ROUE;
    
    echo "<br>";

    echo Cars::getStaticNb_Roue();

    echo "<br>";

    echo Cars::NB_ROUE;

    ?>
</body>

</html>