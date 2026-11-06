<?php
    #[Attribute(Attribute::TARGET_METHOD)]
    class Route {
        public function __construct(
            public string $path,
            public ?string $name = null
        ) {}
    }

    class HomeController {
        #[Route('/inicio', name: 'home')]
        public function index() { return "Página de inicio"; }

        #[Route('/contacto')]
        public function contacto() { return "Contacto"; }
    }

    $clase = new ReflectionClass(HomeController::class);

    foreach ($clase->getMethods() as $metodo) {
        foreach ($metodo->getAttributes(Route::class) as $attr) {
            $ruta = $attr->newInstance();   // AQUÍ se crea el objeto Route
            echo $ruta->path . " → " . $metodo->getName() . "\n";
        }
    }
    // Salida:
    // /inicio → index
    // /contacto → contacto
?>

