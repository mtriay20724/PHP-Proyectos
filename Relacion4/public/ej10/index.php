<?php
    require_once "Persona.php";
    $persona = new Persona("Paco", 67, "Madrid");
    echo $persona->getNombre();
    echo "<br>".$persona->getEdad();
    echo "<br>".$persona->getCiudad();

    echo $persona->getHOLA();    // ¿qué sale?
    echo $persona->saludar();    // ¿y aquí?
?>