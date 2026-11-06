<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cesar</title>
</head>
<body>

<?php
$dado1 = random_int(1, 6);
$dado2 = random_int(1, 6);
?>

<p>
    <img src="../img/<?= $dado1 ?>.png" alt="primer dado" width="140" height="140">
    <img src="../img/<?= $dado2 ?>.png" alt="segundo dado" width="140" height="140">
</p>

<br>

<?php
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