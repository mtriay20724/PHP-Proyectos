<?php
    class Persona{
        protected string $nombre;
        protected int $edad;
        protected string $ciudad;

        public function __construct(string $nombre, int $edad, string $ciudad){
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->ciudad = $ciudad;
        }

        public function __call(string $name, array $arguments): mixed{
            // TODO: Implement __call() method.
            if(str_starts_with($name, "get")){
                $resto = substr($name, 3);
                $propiedad = lcfirst($resto);

                if(property_exists($this, $propiedad)){
                    return $this->$propiedad;
                }
            }
            return "<br>Error no hay ninguna funcion con los siguientes nombres: " . $name;
        }

    }
?>