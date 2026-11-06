<?php

    class Animal{
        private int $tamaño;
        private string $tipo;
        private string $color;
        private string $nombre;

        public function __construct($tamano, $tipo, $color, $nombre){
            if(!$this->setNombre($nombre)){
                throw new Exception("Nombre no valido");
            }
            $this->tamaño = $tamano;
            $this->tipo = $tipo;
            $this->color = $color;
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre(string $nombre): bool
        {
            if(mb_strlen($nombre) > 21){
                return false;
            }
            $this->nombre = $nombre;
            return true;
        }

        /**
         * @return mixed
         */
        public function getColor()
        {
            return $this->color;
        }

        /**
         * @param mixed $color
         */
        public function setColor(string $color): void
        {
            $this->color = $color;
        }

        /**
         * @return mixed
         */
        public function getTipo()
        {
            return $this->tipo;
        }

        /**
         * @param mixed $tipo
         */
        public function settipo($tipo): void
        {
            $this->tipo = $tipo;
        }

        /**
         * @return mixed
         */
        public function getTamaño()
        {
            return $this->tamaño;
        }

        /**
         * @param mixed $tamaño
         */
        public function setTamaño($tamaño): void
        {
            $this->tamaño = $tamaño;
        }

        public function mostrar_Propiedades(): void{
            printf("<h1>Perro</h1> <br><h3>Tamaño:</h3> %s<br><h3>Tipo:</h3> %s<br><h3>Color:</h3> %s<br><h3>Nombre:</h3> %s ",$this->getTamaño(), $this->getTipo(), $this->getColor(), $this->getNombre());
        }

        public function speak(): string{
            return "Guau";
        }

    }

?>
