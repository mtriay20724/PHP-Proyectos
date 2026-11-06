<?php
    /*Escribe una función personalizada para calcular potencias que reciba
    dos parámetros: la base y el exponente.
    Configura el script para que el exponente sea opcional
    y adquiera por defecto el valor de 2. Realiza llamadas de prueba variando
    el número de argumentos*/

function personalizada(int $base, int $exponente= 2){
        $resultado = 1;

        for($i = 1; $i <= $exponente; $i++){
            $resultado *= $base;
        }
        return $resultado;
    }

    echo personalizada(4);
    echo personalizada(2, 8);

?>