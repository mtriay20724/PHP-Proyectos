<?php
    $provincias = ["Granada", "Cadiz", "Cordoba", "Huelva", "Sevilla", "Almeria", "Jaen", "Malaga"];

    echo "Antes de borrar el indice 2";
    echo "<br>";
    foreach ($provincias as $provincia) {
        echo $provincia . "<br>";
    }

    unset($provincias[2]);
    echo "<br>";
    echo "Despues de borrar el indice 3";
    echo "<br>";
    foreach ($provincias as $provincia) {
        echo $provincia . "<br>";
    }
?>
