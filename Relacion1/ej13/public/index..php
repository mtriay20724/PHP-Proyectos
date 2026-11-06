<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cesar</title>
</head>
<body>
<?php
if (isset($_GET['num1']) && isset($_GET['num2'])) {

    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];

    if (is_numeric($num1) && is_numeric($num2)) {

        echo "$num1 + $num2 = " . ($num1 + $num2) . "<br>";
        echo "$num1 - $num2 = " . ($num1 - $num2) . "<br>";
        echo "$num1 * $num2 = " . ($num1 * $num2) . "<br>";

        if ($num2 == 0) {
            echo "$num1 / $num2 = No se puede dividir entre cero<br>";
        } else {
            echo "$num1 / $num2 = " . ($num1 / $num2) . "<br>";
        }

    } else {
        echo "Error: los dos valores tienen que ser números.";
    }

} else {
    echo "Faltan parámetros. Usa: ?num1=8&num2=2";
}
?>
</body>
</html>