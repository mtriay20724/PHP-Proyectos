<?php
    $animales = [];

    $rango = random_int(20, 30);

    for($i = 0; $i < $rango; $i++) {}

    function crearAnimales(int $cantidad){
        return array_map(
            fn(): int => random_int(12800, 12860),
            range(1, $cantidad)
        );
    }

    function mostarAnimales(int $cantidad){
        return array_map();
    }
?>