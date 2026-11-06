<?php
    /*a) Crea un array asociativo (o diccionario) con el censo de población de:
    España, Portugal, Francia, Italia y Grecia.
    b) Define un array asociativo cuyas claves sean palabras en castellano y sus valores
    correspondientes sean las traducciones de dichas palabras en inglés.
    Genera de forma dinámica, a partir del array, una tabla HTML limpia
    que muestre el diccionario de sinónimos de manera ordenada en dos columnas.
    */

    //Hacer cantidad un numero aleatorio del 20 al 30
    $cantidad = random_int(20, 30);

    //Crear array
    function generarAnimales(int $cantidad)
    {
        return array_map(
            fn(): int => random_int(128000, 128060),
            range(1, $cantidad)
        )
    }

    //Mostrar los elementos
    function codigosAEmoji(array $codigo)
    {
        $emoji = array_map(fn(int $codigo):
            string = mb_chr($codigo, 'UTF-8'),  $codigo);
        return implode('', $emoji);
    }
    $numero = random_int(20, 30);


    // array_diff()
    //Numero de emoji del pulpo 182025
    function eliminarPulpo(int $cantidad)
    {
        
    }

?>