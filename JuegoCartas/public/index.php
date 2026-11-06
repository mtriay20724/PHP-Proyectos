<?php
declare(strict_types=1);

require __DIR__ . '/../autoloader.php';

use Enums\Palo;
use Enums\Valor;
use Lib\Pages;
use Models\Baraja;
use Models\Carta;
use Controllers\BarajaController;

// Creamos una carta
$carta = new Carta(Valor::As, Palo::Oros);
echo "Carta: $carta<br>";
echo "Número: {$carta->getNumero()}<br>";
echo "Palo: {$carta->getPalo()->value}<br><br>";
echo "Imagen: {$carta->getNombreImagen()}<br><br>";

// Creamos una baraja
$baraja = new Baraja();

//Mostrar todas las imágenes de las cartas de una baraja
$pages = new Pages();
$pages->render('baraja/muestraBaraja', [
    'cartas' => $baraja->getCartas(),
    'titulo' => 'Baraja completa',
]);

echo "Cartas al crear la baraja: {$baraja->totalCartas()}<br>"; // 48

$cartas = $baraja->getCartas();
echo "Primera: {$cartas[0]}<br>";
echo "Última: {$cartas[array_key_last($cartas)]}<br><br>";

// Barajamos
$baraja->barajar();
$cartas = $baraja->getCartas();
echo "Primera carta después de barajar: {$cartas[0]}<br><br>";

// Sacamos tres cartas
for ($i = 1; $i <= 3; $i++) {
    $sacada = $baraja->sacarCarta();
    echo "Carta $i: $sacada (quedan {$baraja->totalCartas()})<br>";
}

// Vaciar la baraja y comprobar que devuelve null
while ($baraja->totalCartas() > 0) {
    $baraja->sacarCarta();
}

echo "<br>Cartas restantes: {$baraja->totalCartas()}<br>"; // 0
var_dump($baraja->sacarCarta()); // NULL

$controller = new BarajaController();
$controller->barajar();



