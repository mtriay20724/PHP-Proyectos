<?php
    require_once "Animal.php";

class perro extends Animal{
        private string $raza;

        public function __construct($tamano, $tipo, $color, $nombre, $raza){
            parent::__construct($tamano, $tipo, $color, $nombre);
            $this->raza = $raza;
        }

        /**
         * @return string
         */
        public function getRaza(): string
        {
            return $this->raza;
        }

        /**
         * @param string $raza
         */
        public function setRaza(string $raza): void
        {
            $this->raza = $raza;
        }


        public function mostrar_Propiedades(): void {
            parent::mostrar_Propiedades();
            echo "<br>Raza: " . $this->raza;
        }


    }
?>