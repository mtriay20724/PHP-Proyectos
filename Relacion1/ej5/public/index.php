<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cesar</title>
</head>
<body>

<?php


    $radio_dado=10;

    $logitud=0;
    $Superficie=0;
    $Volumen=0;


    function sacarLongitud($radio)
    {
        $total=2*pi()*$radio;
        return $total;
    }

    function sacarSuperficie($radio)
    {
        $total = 4 * pi() * $radio * $radio;
        return $total;
    }

    function sacarVolumen($radio)
    {
        $total = (4/3) * pi() * $radio * $radio * $radio;
        return $total;
    }
    $logitud = sacarLongitud($radio_dado);
    $Superficie = sacarSuperficie($radio_dado);
    $Volumen = sacarVolumen($radio_dado);

    echo "<h2>Resultados usando el round() que redondea pero si acaba e 0 los quira</h2>";
    echo "Longitud: " . round($logitud, 2) . "<br>";
    echo "Superficie: " . round($Superficie, 2) . "<br>";
    echo "Volumen: " . round($Volumen, 2) . "<br>";

    echo "<h2>Resultados con printf() el pro </h2>";
    printf("Longitud: %.2f<br>", $logitud);
    printf("Superficie: %.2f<br>", $Superficie);
    printf("Volumen: %.2f<br>", $Volumen);



?>

</body>
</html>


