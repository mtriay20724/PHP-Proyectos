<?php
    const N = 10;

    $array1 = [];
    $array2 = [];
    $array3 = [];

    // Array 1: de 1 a N
    for ($i = 1; $i <= N; $i++) {
        $array1[] = $i;
    }

    // Array 2: de N a 1
    for ($i = N; $i >= 1; $i--) {
        $array2[] = $i;
    }

    // Array 3: suma posición a posición
    for ($i = 0; $i < N; $i++) {
        $array3[] = $array1[$i] + $array2[$i];
    }

    // Mostrar resultado
    foreach ($array3 as $posicion => $valor) {
        echo "Posición $posicion: $valor<br>";
    }
?>