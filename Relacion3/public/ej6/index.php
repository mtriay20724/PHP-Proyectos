<?php

    $ej6 = [
        ["pais" => "España", "censoPoblacion" => 50000000],
        ["pais" => "Portugal", "censoPoblacion" => 11400000],
        ["pais" => "Francia", "censoPoblacion" => 69000000],
        ["pais" => "Italia", "censoPoblacion" => 58000000],
        ["pais" => "Grecia", "censoPoblacion" => 14000000],
    ];

    $arrayDiccionario = [
        "Hola"  => "Hello",
        "guapo" => "beautiful",
        "uno"   => "one",
        "dos"   => "two",
    ];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Capitales</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>
                Español
            </th>
            <th>
                Traducción
            </th>
        </tr>
        <?php foreach ($arrayDiccionario as $original => $traduccion) { ?>
            <tr>
                <td><?= $original?> </td>
                <td><?= $traduccion ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "Ahora con la tabla de capitales y censo de poblacion";
        echo "<br>";
        echo "<br>";
    ?>

    <table border = "1">
        <tr>
            <th>Pais</th>
            <th>Personas</th>
        </tr>

        <?php foreach($ej6 as $fila) { ?>
            <tr>
                <td><?= $fila["pais"] ?>/td>
                <td><?= $fila["censoPoblacion"] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>