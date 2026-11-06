<?php
    require_once "CalculadorEnvio.php";
    abstract class  EnvioBase implements CalculadorEnvio {
        protected float $peso;
        protected int $distancia;

        public function __construct(float $peso, int $distancia) {
            $this->peso = $peso;
            $this->distancia = $distancia;
        }


    }
?>