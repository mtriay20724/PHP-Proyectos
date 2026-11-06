<?php
    class Coche {
        public $color = "Rojo";
        public $marca = "Ferrari";
        public $modelo = "Aventador";
        public $velocidad = 300;
        public $caballos = 500;
        public $plazas = 2;

        public function acelerar() {
            $this->velocidad += 1;
        }

        public function frenar() {
            $this->velocidad -= 1;
        }

        /**
         * @param string $color
         */
        public function setColor(string $color): void
        {
            $this->color = $color;
        }

        /**
         * @return string
         */
        public function getColor(): string
        {
            return $this->color;
        }


    }

?>