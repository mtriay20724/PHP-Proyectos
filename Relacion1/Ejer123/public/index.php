<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

<?php
//1. Tipos de datos básicos
//Crear tres variables: país, habitantes y continente y asígnales un valor inicial adecuado.
//Muestra por pantalla el valor de cada una junto con el tipo de dato que PHP le ha asignado de manera automática.


$pais = "España";
$habitantes = 20000;
$continente = "Europa";


echo "País: " . $pais . " (tipo: " . gettype($pais) . ")<br>";
echo "Habitantes: " . $habitantes . " (tipo: " . gettype($habitantes) . ")<br>";
echo "Continente: " . $continente . " (tipo: " . gettype($continente) . ")<br>";


echo ("<br>");

// 2. Conversor de moneda (Euros a Dólares)
// Desarrolla un conversor de moneda que transforme una cantidad fija de euros a dólares.
// Define el tipo de cambio actual como una constante o variable y muestra el resultado en pantalla de forma clara.

const TIPO_CAMBIO = 1.08; // 1 euro = 1.08 dólares (ejemplo)

$euros = 50;
$dolares = $euros * TIPO_CAMBIO;
?>
<p>Cantidad en euros: <?= $euros ?>€</p>
<p>Tipo de cambio: 1€ = <?= TIPO_CAMBIO ?>$</p>
<p>Cantidad en dólares: <?= $dolares ?>$</p>
<?php

echo ("<br>");

// Escriba un script que muestre la tirada de dos dados al azar y diga:
// - si ha salido una pareja de valores iguales
// - el mayor de los valores que se han obtenido en la tirada

$dado1 = random_int(1, 6);
$dado2 = random_int(1, 6);

echo "Dado 1: " . $dado1 . "<br>";
echo "Dado 2: " . $dado2 . "<br>";

if ($dado1 === $dado2) {
    echo "¡Pareja! Han salido dos valores iguales (" . $dado1 . ")<br>";
} else {
    echo "No ha salido pareja.<br>";
}

$mayor = max($dado1, $dado2);
echo "El valor más alto de la tirada es: " . $mayor . "<br>";

?>
</body>
</html>
