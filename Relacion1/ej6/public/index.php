<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cesar</title>
</head>
<body>
<?php

$num1 = (int)$_GET["num1"] ;
$num2 = (int)$_GET["num2"] ;


if (empty($num1) or empty($num2)) {
    echo "Faltan parámetros, revisa num1 y num2";

} else if (!is_numeric($num1) or !is_numeric($num2)) {

    echo "num1 y num2 tienen que ser números";
} else {
    echo "El resultado de la suma es: " . ($num1 + $num2);
}

?>


</body>
</html>
