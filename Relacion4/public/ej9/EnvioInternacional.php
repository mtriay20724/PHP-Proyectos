<?php
    require_once "EnvioBase.php";

    class EnvioInternacional extends EnvioBase {
        public function calcularCosto(): float {
            $costo_base = 20.0;
            $costo_por_peso = $this->peso * 5.0;
            $costo_por_distancia = ($this->distancia > 500) ? $this->distancia * 0.1 : 0.0;
            return $costo_base + $costo_por_peso + $costo_por_distancia;
        }
    }