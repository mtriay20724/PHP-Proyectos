<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cesar</title>
</head>
<body>
<?php
$base = 9;

for ($i = 1; $i <= $base; $i+= 2) {
    $espacios = ($base - $i) / 2;

    echo str_repeat("&nbsp;", $espacios);
    echo str_repeat("*", $i);
    echo "<br>";
}
?>
</body>
</html>