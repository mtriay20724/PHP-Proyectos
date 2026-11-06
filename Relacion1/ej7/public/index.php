<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cesar</title>
</head>
<body>
<?php

$numeros = [
"One" => "Uno",
"Two" => "Dos",
"Three" => "Tres",
"Four" => "Cuatro",
"Five" => "Cinco",
"Six" => "Seis",
"Seven" => "Siete",
"Eight" => "Ocho",
"Nine" => "Nueve",
"Ten" => "Diez"
];

?>
<table border="1">
<tr>
    <th>Inglés</th>
    <th>Castellano</th>
</tr>
    <?php foreach ($numeros as $ingles => $castellano): ?>
    <tr>
        <td><?php echo $ingles; ?></td>
        <td><?php echo $castellano; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
