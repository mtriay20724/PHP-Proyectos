<?php
    public class CuentaAhorro extends CuentaBancaria {
        private float $interes;
        public function __construct(string $titular, float $saldo,float $interes) {
            parent::__construct($titular, $saldo);
            $this->interes = $interes;
        }

        public function resumen(): string{
            return printf("Titular: %s   | Saldo: %f\n", $this->titular, $this->getSaldo());
        }

    }


?>