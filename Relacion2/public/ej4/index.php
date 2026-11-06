<?php

    $cadena = "Hola, mundo. ¿Qué tal estás hoy?";

    echo mb_strlen($cadena);
    echo substr($cadena, 0, 11);
    echo strpos($cadena, "Mundo");
    echo strpos($cadena, "mundo");
?>