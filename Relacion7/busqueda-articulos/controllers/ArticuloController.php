<?php
declare(strict_types=1);

/**
 * Controlador de artículos: recibe la petición, valida, consulta al modelo
 * y decide qué vista mostrar (y con qué código HTTP).
 */
class ArticuloController
{
    public function __construct(private Articulo $modelo)
    {
    }

    /** Muestra solo el formulario de búsqueda (200 OK). */
    public function index(): void
    {
        $idBuscado = '';
        $this->render('buscar', compact('idBuscado'));
    }

    /** Procesa la búsqueda: index.php?controller=articulo&action=buscar&id=99 */
    public function buscar(): void
    {
        // 1. Recoger y sanear: quitamos espacios en blanco
        $idBruto = trim((string)($_GET['id'] ?? ''));
        $idBuscado = $idBruto; // para rellenar de nuevo el campo del formulario

        // 2. Validar: ¿se ha proporcionado?
        if ($idBruto === '') {
            http_response_code(400);
            $this->render('error', [
                'titulo'    => 'Falta el identificador',
                'mensaje'   => 'No has introducido ningún identificador. Escribe uno y vuelve a buscar.',
                'idBuscado' => $idBuscado,
            ]);
            return;
        }

        // 3. Validar: ¿es un entero positivo?
        $id = filter_var($idBruto, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);

        if ($id === false) {
            http_response_code(400);
            $this->render('error', [
                'titulo'    => 'Identificador no válido',
                'mensaje'   => 'El identificador debe ser un número entero positivo (por ejemplo: 1, 2 o 99).',
                'idBuscado' => $idBuscado,
            ]);
            return;
        }

        // 4. Pedir el artículo al modelo
        $articulo = $this->modelo->buscarPorId($id);

        // 5. Decidir la vista según el resultado
        if ($articulo === null) {
            http_response_code(404); // cabecera ANTES de cargar la vista
            $this->render('error', [
                'titulo'    => 'Artículo no encontrado',
                'mensaje'   => 'Lo sentimos, el artículo que estás buscando no existe.',
                'idBuscado' => $idBuscado,
            ]);
            return;
        }

        http_response_code(200);
        $this->render('articulo', compact('articulo', 'idBuscado'));
    }

    /** Carga una vista pasándole las variables indicadas. */
    private function render(string $vista, array $datos = []): void
    {
        extract($datos);
        require __DIR__ . '/../views/' . $vista . '.php';
    }
}
