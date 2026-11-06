<?php
    $array =[];
    $arrayCuadrados = [];
    while (count($array) < 20){
        $cantidad = random_int(0, 100);

        array_push($array, $cantidad);
        array_push($arrayCuadrados, $cantidad**2);
    }

    foreach ($array as $elemento) {
        echo $elemento . "<br>";
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Ahora vamos a ver los valores al cuadrado";

    foreach ($arrayCuadrados as $elemento) {
        echo $elemento . "<br>";
    }
?>
