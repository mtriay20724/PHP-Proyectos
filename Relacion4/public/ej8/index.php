<?php
    require_once "Producto.php";
    require_once "Usuario.php";

    $usuario = new Usuario();
    $producto = new Producto();

    echo "Usuario: ".$usuario->getId()."<br>";

    echo "Producto: ". $producto->getId()."<br>";

?>