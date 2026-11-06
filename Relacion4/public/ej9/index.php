<?php
    require_once "EnvioBase.php";
    require_once "EnvioEstandar.php";
    require_once "EnvioExpress.php";
    require_once "EnvioInternacional.php";


    $pedidoEstandar = new EnvioEstandar(12.5, 10);
    $pedidoExpress = new EnvioExpress(12.5, 10);
    $pedidoInternacional = new EnvioInternacional(12.5, 10);

    echo "Envío estándar: " . $pedidoEstandar->calcularCosto() . " €<br>";
    echo "Envío Express: " . $pedidoExpress->calcularCosto() . " €<br>";
    echo "Envío Internacional: " . $pedidoInternacional->calcularCosto() . " €<br>";



?>