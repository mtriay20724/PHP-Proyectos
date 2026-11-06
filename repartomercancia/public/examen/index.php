<?php
declare(strict_types=1);

// ---------- DATOS ----------
$catalogo = [
    ["producto" => "Cuaderno A4", "precio" => 2.5, "pesoKG" => 1.0, "stock" => 8,  "descuento" => 10.0],
    ["producto" => "Bolígrafo",   "precio" => 0.9, "pesoKG" => 0.4, "stock" => 25, "descuento" => null],
    ["producto" => "Archivador",  "precio" => 4.2, "pesoKG" => 3.0, "stock" => 1,  "descuento" => 15.0],
];

$clientes = [
    ["id" => 1, "nombre" => "Pablo"],
    ["id" => 2, "nombre" => "Lucía"],
    ["id" => 3, "nombre" => "Marcos"],
    ["id" => 4, "nombre" => "Elena"],
];

// ---------- FUNCIONES ----------

// Genera N pedidos aleatorios. Los índices van de 0 a count()-1.
function generarPedidos(array $clientes, array $catalogo, int $cantidad = 15): array
{
    $pedidos = [];
    for ($i = 1; $i <= $cantidad; $i++) {
        $pedidos[] = [
            "id"             => $i,
            "cliente"        => $clientes[random_int(0, count($clientes) - 1)],
            "indiceProducto" => random_int(0, count($catalogo) - 1),
            "unidades"       => random_int(1, 5),
        ];
    }
    return $pedidos;
}

// Recorre los PEDIDOS; si hay stock lo descuenta del catálogo (por referencia)
// y marca el pedido como servido. Si no hay stock, lo marca como no servido y sigue.
function actualizarStock(array $pedidos, array &$catalogo): array
{
    foreach ($pedidos as $i => $pedido) {
        $p = $pedido["indiceProducto"];

        if ($catalogo[$p]["stock"] >= $pedido["unidades"]) {
            $catalogo[$p]["stock"] -= $pedido["unidades"];
            $pedidos[$i]["servido"] = true;
        } else {
            $pedidos[$i]["servido"] = false;
        }
    }
    return $pedidos;
}

// Precio unitario tras aplicar el descuento (si es null, sin descuento).
function precioConDescuento(array $producto): float
{
    $descuento = $producto["descuento"] ?? 0.0;
    return $producto["precio"] * (1 - $descuento / 100);
}

// Aplica el IVA a un precio.
function aplicarIVA(float $precio, float $iva = 0.21): float
{
    return round($precio * (1 + $iva), 2);
}

// ---------- LÓGICA ----------
$pedidos = generarPedidos($clientes, $catalogo);
$pedidos = actualizarStock($pedidos, $catalogo);

$totalFacturado = 0.0;
$pesoTotal = 0.0;

foreach ($pedidos as $i => $pedido) {
    $producto = $catalogo[$pedido["indiceProducto"]];
    $precioUnidad = aplicarIVA(precioConDescuento($producto));
    $totalPedido = $pedido["servido"] ? round($precioUnidad * $pedido["unidades"], 2) : 0.0;
    $pesoPedido = $pedido["servido"] ? $producto["pesoKG"] * $pedido["unidades"] : 0.0;

    $pedidos[$i]["nombreProducto"] = $producto["producto"];
    $pedidos[$i]["precioUnidad"] = $precioUnidad;
    $pedidos[$i]["total"] = $totalPedido;
    $pedidos[$i]["peso"] = $pesoPedido;

    $totalFacturado += $totalPedido;
    $pesoTotal += $pesoPedido;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reparto de Mercancías</title>
</head>
<body>
<h1>Reparto de Mercancías</h1>

<h2>Pedidos</h2>
<table border="1" cellpadding="6">
    <tr>
        <th>Id</th><th>Cliente</th><th>Producto</th><th>Unidades</th>
        <th>Precio/ud (con IVA)</th><th>Total</th><th>Peso (kg)</th><th>Estado</th>
    </tr>
    <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= $pedido["id"] ?></td>
            <td><?= htmlspecialchars($pedido["cliente"]["nombre"]) ?></td>
            <td><?= htmlspecialchars($pedido["nombreProducto"]) ?></td>
            <td><?= $pedido["unidades"] ?></td>
            <td><?= number_format($pedido["precioUnidad"], 2) ?> €</td>
            <td><?= number_format($pedido["total"], 2) ?> €</td>
            <td><?= number_format($pedido["peso"], 1) ?></td>
            <td><?= $pedido["servido"] ? "Servido" : "Sin stock" ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<p>Total facturado: <strong><?= number_format($totalFacturado, 2) ?> €</strong></p>
<p>Peso total a repartir: <strong><?= number_format($pesoTotal, 1) ?> kg</strong></p>

<h2>Stock final</h2>
<ul>
    <?php foreach ($catalogo as $producto): ?>
        <li><?= htmlspecialchars($producto["producto"]) ?>: <?= $producto["stock"] ?> uds</li>
    <?php endforeach; ?>
</ul>
</body>
</html>