<?php

require_once "PerfilJugador.php";

// 1. Crear una instancia
$jugador1 = new PerfilJugador("Gamer123", 9500);

// 2. Usar el objeto
$jugador1->agregarLog("Inició sesión.");
$jugador1->agregarLog("Superó el nivel 5.");

// 3. Mostrar estado original
echo "<h3>Objeto original</h3><pre>";
var_dump($jugador1);
echo "</pre>";

// 4. Serializar
$datosSerializados = serialize($jugador1);

// 5. Mostrar datos serializados (no debe aparecer _logTemporal)
echo "<h3>Datos serializados</h3><pre>";
echo htmlspecialchars($datosSerializados);
echo "</pre>";

// 6. Simular guardar/cargar
file_put_contents("perfil.txt", $datosSerializados);
$datosCargados = file_get_contents("perfil.txt");

// 7. Restaurar el objeto
$jugadorRestaurado = unserialize($datosCargados);

// 8. Mostrar el objeto restaurado
echo "<h3>Objeto restaurado</h3><pre>";
var_dump($jugadorRestaurado);
echo "</pre>";
