<?php
    require_once "producto.php";
    $producto1 = new Producto();
    $producto2 = new Producto();
    $producto3 = new Producto();
    $producto4 = new Producto();
    $producto5 = new Producto();

    echo "Numero de productos: ". Producto::obtenerCantidadProductos();

?>