<?php
    trait identificable{
        abstract protected function getPrefijoId(): string;

        public function generarId(): string{
            $numAleatorio = random_int(1000, 9999);
            return $this->getPrefijoId().$numAleatorio;
        }
    }
?>