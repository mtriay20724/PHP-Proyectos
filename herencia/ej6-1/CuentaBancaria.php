<?php
    public class CuentaBancaria{
        protected string $titular;
        protected float $saldo = 0;
        public function __construct(string $titular){
            $this->titular = $titular;
        }

        public function getSaldo(): float{
            return $this->saldo;
        }

        public function ingresar(float $cantidad): float{
            if($cantidad < 0){
                throw new Exception("La cantidad de cuentas no puede ser menor que 0");
            }else{
                $this->saldo += $cantidad;
            }
            return $this->saldo;
        }

        //retirar(float $cantidad): lanza una excepción si la cantidad no es positiva o si supera el saldo.

        public function retirar(float $cantidad): float{
            if($cantidad < 0 && $cantidad > $this->$saldo){
                throw new Exception("La cantidad a retirar no puede ser menor que 0 o mayor que saldo");
            }else{
                $this->saldo -= $cantidad;
            }
            return $this->saldo;
        }
    }
?>
