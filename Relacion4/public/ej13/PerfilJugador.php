<?php

class PerfilJugador
{
    public string $nombre;
    public int $puntuacionMaxima;
    private array $_logTemporal = [];

    public function __construct(string $nombre, int $puntuacionMaxima)
    {
        $this->nombre = $nombre;
        $this->puntuacionMaxima = $puntuacionMaxima;
    }

    public function agregarLog(string $mensaje): void
    {
        $this->_logTemporal[] = $mensaje;
    }

    public function getLog(): array
    {
        return $this->_logTemporal;
    }

    // Se llama al hacer serialize(): devuelve SOLO lo que queremos guardar
    public function __serialize(): array
    {
        return [
            'nombre' => $this->nombre,
            'puntuacionMaxima' => $this->puntuacionMaxima,
        ];
    }

    // Se llama al hacer unserialize(): recibe el array de __serialize()
    public function __unserialize(array $datos): void
    {
        $this->nombre = $datos['nombre'];
        $this->puntuacionMaxima = $datos['puntuacionMaxima'];
        $this->_logTemporal = []; // el log no se guardó: empieza vacío
    }
}
