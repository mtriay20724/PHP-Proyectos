<?php
    //Desarrolla un script que añada de forma automática valores numéricos enteros
    //a un array utilizando un bucle (mientras su longitud sea inferior a 120
    //elementos).
    //Una vez rellenado, muestra el contenido completo del array por pantalla.

    $array = [1,2];

    while(count($array) <= 120) {
        $cantidad = random_int(3,120);
        echo "<br>";
        array_push($array, $cantidad);
    }
    foreach ($array as $elemento) {
        echo $elemento . "<br>";
    }

?>
