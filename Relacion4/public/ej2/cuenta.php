
<?php
class Cuenta {
    public float $saldo {
        set {
            if ($value < 0) {
                throw new InvalidArgumentException("Saldo insuficiente");
            }
            $this->saldo = $value;
        }
    }

    public string $titular {
        set {
            $this->titular = ucwords(trim($value));
        }
    }

    public string $saldoFormateado {
        get => number_format($this->saldo, 2, ',', '.') . ' €';
    }


    public function __construct(float $saldo, string $titular) {
        $this->saldo = $saldo;
        $this->titular = $titular;
    }
    /*PHP 8

    public function __construct(
        public float $saldo,
        public string $titular
    ){}*/

}
?>
