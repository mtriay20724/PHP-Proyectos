<?php
declare(strict_types=1);

/**
 * Modelo Articulo: contiene los datos de los artículos y la lógica de búsqueda.
 */
class Articulo
{
    /** @var array<int, array{id:int, nombre:string, descripcion:string, precio:float}> */
    private array $articulos = [
        1 => [
            'id'          => 1,
            'nombre'      => 'Teclado mecánico',
            'descripcion' => 'Teclado mecánico con switches rojos y retroiluminación RGB.',
            'precio'      => 59.99,
        ],
        2 => [
            'id'          => 2,
            'nombre'      => 'Ratón inalámbrico',
            'descripcion' => 'Ratón ergonómico inalámbrico con sensor de 16000 DPI.',
            'precio'      => 34.50,
        ],
        3 => [
            'id'          => 3,
            'nombre'      => 'Monitor 27"',
            'descripcion' => 'Monitor IPS de 27 pulgadas, resolución 2K y 144 Hz.',
            'precio'      => 249.00,
        ],
        99 => [
            'id'          => 99,
            'nombre'      => 'Auriculares <Pro>',
            'descripcion' => 'Auriculares con cancelación de ruido & micrófono "boom".',
            'precio'      => 89.90,
        ],
    ];

    /**
     * Busca un artículo por su identificador.
     *
     * @return array|null Datos del artículo, o null si no existe.
     */
    public function buscarPorId(int $id): ?array
    {
        return $this->articulos[$id] ?? null;
    }
}
