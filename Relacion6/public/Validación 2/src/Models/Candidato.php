<?php

namespace Models;

class Candidato{
    public function __construct(
        public string $nombre = "",
        public string $apellidos = "",
        public string $correo = "",
        public string $telefono = "",
        public string $situacion = "",
        public array $lenguajes = [],
        public string $url = "",
    ){}

    public static function fromArray(array $datos): self{
        return new self(
            nombre: trim($datos["nombre"] ?? ""),
            apellidos: trim($datos["apellidos"] ?? ""),
            correo: trim($datos["correo"] ?? ""),
            telefono: trim($datos["telefono"] ?? ""),
            situacion: trim($datos["situacion"] ?? ""),
            lenguajes: ($datos["lenguajes"] ?? []),
            url: trim($datos["url"] ?? ""),
        );
    }
}