<?php
/**
 * Front controller (punto de entrada único).
 * Ejemplo: index.php?controller=articulo&action=buscar&id=99
 */
declare(strict_types=1);

require_once __DIR__ . '/models/Articulo.php';
require_once __DIR__ . '/controllers/ArticuloController.php';

// Lista blanca de controladores y acciones permitidas
$rutas = [
    'articulo' => [
        'clase'    => 'ArticuloController',
        'acciones' => ['index', 'buscar'],
    ],
];

// Saneamos los parámetros de enrutado (solo letras minúsculas)
$controller = strtolower(trim((string)($_GET['controller'] ?? 'articulo')));
$action     = strtolower(trim((string)($_GET['action'] ?? 'index')));

if (!isset($rutas[$controller]) || !in_array($action, $rutas[$controller]['acciones'], true)) {
    http_response_code(404);
    $titulo  = 'Página no encontrada';
    $mensaje = 'La página que buscas no existe.';
    require __DIR__ . '/views/error.php';
    exit;
}

$clase = $rutas[$controller]['clase'];
$objeto = new $clase(new Articulo());
$objeto->$action();
