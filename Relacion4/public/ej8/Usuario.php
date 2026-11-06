<?php
    require_once "identificable.php";
    class Usuario {
        use identificable;
        private string $id;
        private function getPrefijoId(): string
        {
            return "USR";
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