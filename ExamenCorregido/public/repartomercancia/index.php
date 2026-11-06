<?php
    $catalogo = [
        ["producto" => "Cuaderno A4", "precio" => 2.5, "pesoKg" => 1.0, "stock" => 8, "descuento" => 10.0],
        ["producto" => "Boligrafo", "precio" => 0.9, "pesoKg" => 0.4, "stock" => 25, "descuento" => null],
        ["prducto" => "Archivador", "precio" => 4.2, "pesoKg" => 3.0, "stock" => 1, "descuento" => 15.0],
    ];

    $clientes = [
        ["id" => 1, "nombre" => "Pablo"],
        ["id" => 2, "nombre" => "Marcos"],
        ["id" => 3, "nombre" => "Elena"],
        ["id" => 4, "nombre" => "Lucia"],
    ];

    function generarPedidos($clientes, $catalogo){
        $pedidos = [];
        for($i = 1; $i <= 15; $i++){
            $idAleatorio = random_int(1, 4);
            $clienteAleatorio = random_int(1, 4);
            $productoAleatorio = random_int(1, 3);
            $pedidos[$i] = [
                "id"=> $i,
                "cliente" => $clientes[$clienteAleatorio],
                "producto" => $catalogo[$productoAleatorio],
                "unidades" => random_int(1,5)
            ];
        }
        return $pedidos;
    }

    function actualizarStock(array $pedidos, array &$catalogo): array
    {
        foreach ($pedidos as $i => $pedido) {
            $p = $pedido["producto"];

            if ($catalogo[$p]["stock"] >= $pedido["unidades"]) {
                $catalogo[$p]["stock"] -= $pedido["unidades"];
                $pedidos[$i]["servido"] = true;
            } else {
                $pedidos[$i]["servido"] = false;
            }
        }
        return $pedidos;
    }

?>