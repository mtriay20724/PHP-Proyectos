<?php

declare(strict_types=1);

namespace Models;

class Usuario
{
    public function __construct(
        public string $usuario = '',
        public string $contraseña = ''
    )
    {
    }

    public static function fromArray(array $datos): self
    {
        return new self(
            usuario: trim($datos['usuario'] ?? ''),
            contraseña: $datos['contraseña'] ?? 0,
        );
    }

    function getUsuario(): string{
        return $this->usuario;
    }
}