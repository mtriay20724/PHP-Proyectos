<?php

require_once "rango.php";

class Producto
{
    public string $nombre;

    #[Rango(min: 1, max: 1000)]
    public float $precio;

    #[Rango(min: 0, max: 100)]
    public int $stock;

    public function __construct(string $nombre, float $precio, int $stock)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }
}

function validarObjeto(object $objeto): array
{
    $errores = [];

    $reflector = new ReflectionClass($objeto);

    foreach ($reflector->getProperties() as $prop) {
        $atributos = $prop->getAttributes(Rango::class);
        if (empty($atributos)) {
            continue;
        }

        $rango = $atributos[0]->newInstance();

        // Leemos el valor que tiene la propiedad en ESTE objeto
        $valor = $prop->getValue($objeto);
        $nombre = $prop->getName();

        // Comprobamos los límites (solo si existen)
        if ($rango->min !== null && $valor < $rango->min) {
            $errores[] = "$nombre ($valor) es menor que el mínimo ({$rango->min})";
        }
        if ($rango->max !== null && $valor > $rango->max) {
            $errores[] = "$nombre ($valor) es mayor que el máximo ({$rango->max})";
        }
    }

    return $errores;
}

// --- Pruebas ---
print_r(validarObjeto(new Producto("Mesa", 50, 10)));
print_r(validarObjeto(new Producto("Silla", 5000, 200)));