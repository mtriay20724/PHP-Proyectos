<?php
    function matricula($cadena){
        if (preg_match('/^\d{4}[A-Z]{3}$/', $cadena)) {
            return "La cadena $cadena es correcta";
        } else {
            return "La cadena $cadena es incorrecta";
        }
    }

    echo matricula("1234RSP") . "<br>";   // correcta
    echo matricula("12345PRS") . "<br>";  // incorrecta
    echo matricula("12345RS") . "<br>";   // incorrecta
?>