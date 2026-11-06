<?php
    require_once "EnvioBase.php";
    class EnvioEstandar extends EnvioBase {
        private float $costo_base;
        private float $costo_por_peso;

        private float $costo_por_distancia;


        public function calcularCosto():float {
            $costo_base = 0.5;
            $costo_por_peso = $this->peso * 1.5;
            $costo_por_distancia = $this->distancia * 0.05;
            return $costo_base + $costo_por_peso + $costo_por_distancia;
        }


    }
?>