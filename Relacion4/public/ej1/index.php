<?php
    require_once "Coche.php";

    $miCoche = new Coche();

    echo "<h1>Datos del coche</h1>\n";

    echo "Marca: ".$miCoche->marca ."<br>";
    echo "Modelo: ".$miCoche->modelo."<br>";
    echo "Color: ".$miCoche->color."<br>";
    echo "Velocidad: ".$miCoche->velocidad."<br>";

    echo"<h2> Cambiamos el color del coche a amarillo </h2>";

    $miCoche->setColor("amarillo");
    echo "Color: ".$miCoche->color."<br>";

    $miCoche->acelerar();
    $miCoche->acelerar();
    $miCoche->acelerar();
    $miCoche->acelerar();
    $miCoche->frenar();

    echo "<h3>Velocidad: </h3>".$miCoche->velocidad;

    $nuevoCoche = new Coche();
    $nuevoCoche->setColor("Verde");
    $nuevoCoche->modelo = "Gallardo";

    echo "<h1>Datos del NUEVO coche</h1>";

    echo "Marca: ".$nuevoCoche->marca."<br>";
    echo "Modelo: ".$nuevoCoche->modelo."<br>";
    echo "Color: ".$nuevoCoche->color."<br>";
    echo "Caballos: ".$nuevoCoche->caballos."<br>";
    echo "Velocidad: ".$nuevoCoche->velocidad."<br>";
    echo "Plazas: ".$nuevoCoche->plazas."<br>";

?>