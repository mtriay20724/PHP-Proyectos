<?php
    $array = [8, 7, 6, 5, 4, 3, 2, 1];
    //a.recorrer el array y mostrar sus elementos por pantalla
    foreach ($array as $value) {
        echo "{$value} <br>";
    }

    //b.ordenar  de menor a mayor y volver a mostrarlo.

    sort($array);
    foreach ($array as $valor) {
        echo $valor;
    }
    //c.Calcular y mostrar en pantalla su longitud total (número de elementos).
    echo "<br>";

    echo "Hay ". count($array) . " elementos en el array";
    //d.Buscar un elemento concreto dentro del array de forma estática
    //informando si existe o no.


?>