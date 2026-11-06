<?php
    function argumento($texto)
    {
        $resultado ="";
        if(empty($texto)){
            echo"Este es el relleno porque estaba vacía";
        }elseif (is_int($texto)){
            echo "no es una cadena de caracteres";
        }else{
            $resultado = strtoupper($texto);
        }
    }

    echo argumento("Estoy haciendo el ejercicio ");
    echo argumento(7);

?>