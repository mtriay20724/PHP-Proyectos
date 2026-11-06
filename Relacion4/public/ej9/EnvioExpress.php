<?php
    require_once "EnvioBase.php";

    class EnvioExpress extends EnvioBase {
        private float $cargo_urgencia = 10.0;

        public function calcularCosto(): float {
            $costo_base = 0.5;
            $costo_por_peso = $this->peso * 1.5;
            $costo_por_distancia = $this->distancia * 0.05;
            return $costo_base + $costo_por_peso + $costo_por_distancia+ $this->cargo_urgencia;
        }
    }
?>