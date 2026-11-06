<?php
declare(strict_types=1);

namespace Controllers;

use Lib\Pages;
use Models\Baraja;
use Models\Carta;

class BarajaController{
    private Pages $pages;
    private Baraja $baraja;

    public function __construct(){
        $this->pages = new Pages();
        $this->baraja = new Baraja();
    }

    /**
     * Muestra todas las cartas de la baraja, en el orden en que se crearon,
     */
    public function muestraBaraja(): void{
        $this->baraja->barajar();
        $this->mostrarCartas($this->baraja->getCartas(),'Baraja completa');
    }

    /**
     * Baraja el mazo y muestra todas las cartas mezcladas.
     */
    public function barajar(): void{
        $this->baraja->barajar();
        $this->mostrarCartas($this->baraja->getCartas(),"Baraja mezclada");
    }

    /**
     * @param Carta[] $cartas Cartas que se mostrarán
     * @param string $titulo.
     */
    private function mostrarCartas(array $cartas, string $titulo): void{
        $this->pages->render('baraja/muestraBaraja',[
            'cartas' => $cartas,
            'titulo' => $titulo
        ]);
    }
}