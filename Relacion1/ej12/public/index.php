<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cesar</title>
</head>
<body>
<?php
$hoy = time();

$ayer   = strtotime("-1 day", $hoy);
$manana = strtotime("+1 day", $hoy);

echo "Ayer: "   . date("d/m/Y", $ayer)   . "<br>"; // 27/09/2026
echo "Hoy: "    . date("d/m/Y", $hoy)    . "<br>"; // 28/09/2026
echo "Mañana: " . date("d/m/Y", $manana) . "<br>"; // 29/09/2026
?>
</body>
</html>