
<?php
    require_once "cuenta.php";

    $cuenta1 = new Cuenta(1000, "Marc");

    echo "<h1>Cuenta 1</h1>";
    echo "Saldo: " . $cuenta1->saldo . "<br>";
    echo "Titular: " . $cuenta1->titular . "<br>";
    echo "Saldo formateado: " . $cuenta1->saldoFormateado . "<br>";

    // Creamos otra cuenta con saldo negativo para comprobar la validación
    try {
        $cuenta2 = new Cuenta(-20, "marc");
    } catch (InvalidArgumentException $e) {
        echo "<p>Error al crear la cuenta 2: " . $e->getMessage() . "</p>";
    }
?>
