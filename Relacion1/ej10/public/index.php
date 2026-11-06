<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cesar</title>
</head>
<body>

<?php
$cadena =$_GET['cadena'];
$invertida = "";

for ($i = mb_strlen($cadena) - 1; $i >= 0; $i--) {
    $invertida .= mb_substr($cadena, $i, 1);
}

echo $invertida;
?>

</body>
</html>