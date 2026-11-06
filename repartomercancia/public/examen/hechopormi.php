<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reparto de Mercancias</title>
</head>
<body>
<?php

//Catalogo
$catalogo = [
    ["producto" => "Cuadreno A4", "precio" => 2.5, "pesoKG" => 1, "stock" => 8, "descuento"=> 10.0],
    ["producto" => "Boligrafo", "precio" => 0.9, "pesoKG" => 0.4, "stock" => 25, "descuento"=> null],
    ["producto" => "Archivador", "precio" => 4.2, "pesoKG" => 3.0, "stock" => 1, "descuento"=> 15.0],
];

//4 clientes cuya datos estan en un array
$clientes = [
    ["id" => 1, "nombre" =>"Pablo"],
    ["id" => 2, "nombre" =>"Lucia"],
    ["id" => 3, "nombre" =>"Marcos"],
    ["id" => 4, "nombre" =>"Elena"],
];

//array asociativo que genera 15 pedidos

function generarPedidos(&$clientes, &$catalogo)
{
    $pedidos = [];
    for ($i = 1; $i <= 15; $i++) {
        $clienteAleatorio = random_int(1, 4);
        $productoAleatorio = random_int(1, 3);
        $randomUnidades = random_int(1, 5);
        $pedidos[] = ["id" => $i, "cliente" => $clientes[$clienteAleatorio], "producto" => $catalogo[$productoAleatorio], "unidades" => $randomUnidades];
    }
    return $pedidos;
}

function actualizarStock(&$clientes, &$catalogo, &$pedidos)
{
    foreach ($catalogo as $producto) {
        $stock = $clientes['stock'];
        $stockFinal = $stock - $pedidos['unidades'];
        if($stockFinal >= 0){
            $catalogo['stock'] = $catalogo['stock'] - $pedidos['unidades'];
        }else{
            return "El pedido no puede llevarse a cabo por falta de stock";
        }
    }
    return $catalogo['stock'];
}

function implementarIVA(&$clientes, &$catalogo, &$pedidos){
    $precioFinal = $catalogo['precio'];
    foreach ($catalogo as $producto) {
        $precioInicial = $catalogo['precio'];
        $precioFinal = ($catalogo['precio'] * 0.21) + $catalogo['precio'];
    }
    return $precioFinal;
}

function descuentoNull(&$clientes, &$catalogo, &$pedidos)
{
    $descuento = 0;
    foreach ($catalogo as $producto) {

        if($producto['descuento'] !== null){
            $descuento = (($catalogo['descuento'] / 100) * $catalogo['precio']) - $catalogo['descuento'];
        }
    }
    return $descuento;
}

$mercancias = generarPedidos($clientes, $catalogo);
actualizarStock($mercancias);

?>

</body>
</html>


