<?php
    require_once "identificable.php";
    class Producto {
        use identificable;
        private string $id;

        protected function getPrefijoId(): string
        {
            return "PRD";
        }
        public function __construct() {
            $this->id = $this->generarId();
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }


    }
?>