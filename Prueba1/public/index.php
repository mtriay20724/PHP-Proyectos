<?php
    /*Saludos dinámicos con variables de variables*/
    // variables con el saludo en diferentes idiomas
    $saludo_es = "¡Hola!";
    $saludo_en = "Hello!";
    $saludo_it = "Ciao!";

    // Supongamos que la variable idioma almacena el idioma que hemos seleccionado
    $idioma = "it"; // cambia esto a "en" o "it" para probar

    $nombre_variable = "saludo_" . $idioma;
    // $$nombre_variable toma el contenido de texto de una variable y lo utiliza como nombre de otra variable

    echo $$nombre_variable;
?>