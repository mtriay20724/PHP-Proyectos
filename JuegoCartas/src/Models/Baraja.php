<?php
declare(strict_types=1);

namespace Models;

use Enums\Palo;
use Enums\Valor;
class Baraja
{
    private array $cartas = [];

    public function __construct(){
        $this->inicializarBaraja();
    }

    private function inicializarBaraja(): void{
        $this->cartas = [];

        foreach (Palo::cases() as $palo){
            foreach (Valor::cases() as $valor){
                //Creamos el objeto Carta y lo añadimos al mazo
                $this->cartas[] = new Carta($valor, $palo);
            }
        }
    }

    public function getCartas(): array{
        return $this->cartas;
    }

    public function barajar(): void{
        shuffle($this->cartas);
    }

    public function sacarCarta(): ?Carta{
        return array_shift($this->cartas);
    }

    public function totalCartas():int{
        return count($this->cartas);
    }

}